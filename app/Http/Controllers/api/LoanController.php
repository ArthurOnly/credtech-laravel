<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\FileHelper;

use App\Models\Loan;
use App\models\Person;
use App\models\PersonJuridical;
use App\models\PersonPhysical;
use App\models\LoanRequest;
use Exception;

class LoanController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $isValid = FileHelper::verifyFiles($request, ['doc_selfie', 'doc_monthly_income', 'doc_address_comp', 'doc_rg_verse']);
        if (!$isValid){
            return response('{error: true}', 400);
        }

        //Salva todos os arquivos
        $fileName_doc_selfie = FileHelper::storeDoc($request->file('doc_selfie'));
        $fileName_doc_monthly_income = FileHelper::storeDoc($request->file('doc_monthly_income'));
        $fileName_doc_address_comp = FileHelper::storeDoc($request->file('doc_address_comp'));
        $fileName_doc_rg_verse = FileHelper::storeDoc($request->file('doc_rg_verse'));

        try{
            //Verificando tipo de pessoa
            $personJuridicalData = array();
            $personPhysicalData = array();
            if (strlen($request['cpf_cnpj']) < 15){
                $personType = 0;

                //Dados para o model de pessoa física
                $personPhysicalData = [
                    "cpf" => $request['cpf_cnpj']
                ];
            } else{
                $personType = 1;

                $isValidCpfDoc = FileHelper::verifyFiles($request, ['doc_address_comp_partner']);
                if (!$isValidCpfDoc){
                    return response('{error: true}', 400);
                }

                $fileName_doc_address_comp_partner = FileHelper::storeDoc($request->file('doc_address_comp_partner'));

                //Dados para o model de pessoa jurídica
                $personJuridicalData = [
                    "cnpj" => $request['cpf_cnpj'],
                    "cpf_partner" => $request['cpf_partner'],
                    "doc_address_comp_partner" => $request[$fileName_doc_address_comp_partner]
                ];
            }

            //Dados para o model de usuário
            $personData = [
                "name" => $request['name'],
                "celphone" => $request['celphone'],
                "email" => $request['email'],
                "type_id" => $personType,
                "address" => $request['address'],
                "CEP" => $request['CEP'],
                "monthly_income" => $request['monthly_income'],
                "doc_selfie" => $fileName_doc_selfie,
                "doc_address_comp" => $fileName_doc_address_comp,
                "doc_monthly_income" => $fileName_doc_monthly_income,
                "doc_rg_verse" => $fileName_doc_rg_verse,
            ];

            //Dados para o model de empréstimo
            $loanData = [
                "cicle" => $request['cicle'],
                "parcels" => $request['parcels'],
                "value" => $request['value'],
                "warranty_id" => $request["warranty_id"],
                "segment_id" => $request["segment_id"]
            ];
        } catch (Exception $ex){
            return response('{error: true}', 400);
        }

        DB::beginTransaction();
        try{
            //Criando pessoa
            $newPerson = Person::create($personData);
            $newPersonId = $newPerson['id'];

            //Criando complemento de dados da pessoa    
            if ($personType == 0){
                $personPhysicalData["person_id"] = $newPersonId;
                PersonPhysical::create($personPhysicalData);
            } else{
                PersonJuridical::create($personJuridicalData);
            }

            //Criando empréstimo 
            $newLoan = Loan::create($loanData);
            $newLoanId = $newLoan['id'];

            //Criando simulação (Relaciona uma pessoa a um empréstimo)
            $newSimulation = LoanRequest::create([
                "person_id" => $newPersonId,
                "loan_id" => $newLoanId
            ]); 

            DB::commit();
            return $newSimulation;
        }catch (Exception $ex){
            DB::rollBack();

            FileHelper::deleteDoc($fileName_doc_selfie);
            FileHelper::deleteDoc($fileName_doc_address_comp);
            FileHelper::deleteDoc($fileName_doc_monthly_income);
            FileHelper::deleteDoc($fileName_doc_rg_verse);
            FileHelper::deleteDoc($fileName_doc_address_comp_partner);

            return response('{error: true}', 400);
        }
    }

}
