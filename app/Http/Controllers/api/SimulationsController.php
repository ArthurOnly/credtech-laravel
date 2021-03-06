<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Loan;
use App\models\Person;
use App\models\PersonJuridical;
use App\models\PersonPhysical;
use App\models\SimulationRequest;
use Exception;

class SimulationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$simulations = Simulation::all();
        //foreach($simulations as $simulation){
        //   $simulation = $this->addRelations($simulation);
        //}
        //return $simulations;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
                $personJuridicalData["person_id"] = $newPersonId;
                PersonJuridical::create($personJuridicalData);
            }

            //Criando empréstimo 
            $newLoan = Loan::create($loanData);
            $newLoanId = $newLoan['id'];

            //Criando simulação (Relaciona uma pessoa a um empréstimo)
            $newSimulation = SimulationRequest::create([
                "person_id" => $newPersonId,
                "loan_id" => $newLoanId
            ]); 

            DB::commit();
            return $newSimulation;
        }catch (Exception $ex){
            dd($ex);
            DB::rollBack();
            return 'rollback';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $simulation = SimulationRequest::findOrFail($id);

        //dd($simulation);
        $person = $simulation->person();
        $personAddicional = $person->additionalData();
        $loan = $simulation->loan();
        return response([
            "simulation_request" => $simulation, 
            "person_data" => [
                "main_data" => $person,
                "addicional_data" => $personAddicional                
            ], 
            "loan_data" => $loan],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Simulation = SimulationRequest::findOrFail($id);
        $Simulation->delete();
    }
}
