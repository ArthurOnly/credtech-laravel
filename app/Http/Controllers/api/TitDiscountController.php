<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\FileHelper;
use Illuminate\Support\Facades\DB;

use App\models\Person;
use App\models\PersonJuridical;
use App\models\PersonPhysical;
use App\models\Check;
use App\Models\CheckRequest;

class TitDiscountController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //Data colect
            try{
                $isValid = FileHelper::verifyFiles($request, ['doc_check_front', 'doc_check_verse']);
            if (!$isValid){
                return response('{error: true}', 400);
            }

            //Salva todos os arquivos
            $fileName_doc_check_front = FileHelper::storeDoc($request->file('doc_check_front'));
            $fileName_doc_check_back = FileHelper::storeDoc($request->file('doc_check_verse'));

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

                //Dados para o model de pessoa jurídica
                $personJuridicalData = [
                    "cnpj" => $request['cpf_cnpj']
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
            ];



            //Dados para o cheque
            $checkData = [
                'value' => $request['check_value'],
                'pre_dated' => $request['pre_dated'],
                'doc_front' => $fileName_doc_check_front,
                'doc_back' => $fileName_doc_check_back
            ];
        } catch (Exception $ex){
            return response('{error: true}', 400);
        }

        //DB proccess
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
                $personJuridicalData["person_id"] = $newPersonId;
                PersonJuridical::create($personJuridicalData);
            }

            //Criando cheque
            $newCheck = Check::create($checkData);
            $newCheckId = $newCheck['id'];

            //Criando relacionamento
            $checkRequest = CheckRequest::create([
                "person_id" => $newPersonId,
                "check_id" => $newCheckId
            ]);

        } catch (Exception $ex){

        }
    }
}
