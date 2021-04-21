<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\SimulationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return 'inex';
    }
    public function panel(){
        $numberOfSimulations = SimulationRequest::count();
        return view('admin.panel', ['totalSimulations' => $numberOfSimulations]);
    }

    public function simulacoes(){  
        $simulations = [];     
        foreach (SimulationRequest::all() as $simulation){
            $person = $simulation->person()->first();
            $personAddicional = $person->additionalData()->first();
            $loan = $simulation->loan()->first();

            $simulation = [
                "title" => "Simulaçao $simulation->id",
                "Dados pessoais" => [
                    "main_data" => $person->toArray(),
                    "addicional_data" => $personAddicional->toArray()             
                ], 
                "Dados da simulação" => $loan->toArray()  
            ];
            array_push($simulations, $simulation);
        }

        return view('admin.data-template', ['dataArray' => $simulations]);
    }

    public function contatos(){  
        $contacts = [];     
        foreach (Contact::all() as $contact){
            $simulation = [
                "title" => "Contato $contact->id",
                "Dados do contato" => $contact->toArray() 
            ];
            array_push($contacts, $simulation);
        }

        return view('admin.data-template', ['dataArray' => $contacts]);
    }

    public function emprestimos(){  
        $simulations = [];     
        foreach (SimulationRequest::all() as $simulation){
            $person = $simulation->person()->first();
            $personAddicional = $person->additionalData()->first();
            $loan = $simulation->loan()->first();
            $simulation = [
                "title" => 'Simulaçao',
                "simulation_request" => $simulation->toArray(), 
                "person_data" => [
                    "main_data" => $person->toArray(),
                    "addicional_data" => $personAddicional->toArray()             
                ], 
                "loan_data" => $loan->toArray()  
            ];
            array_push($simulations, $simulation);
        }

        return view('admin.data-template', ['dataArray' => $simulations]);
    }

    public function cheques(){  
        $simulations = [];     
        foreach (SimulationRequest::all() as $simulation){
            $person = $simulation->person()->first();
            $personAddicional = $person->additionalData()->first();
            $loan = $simulation->loan()->first();
            $simulation = [
                "title" => 'Simulaçao',
                "simulation_request" => $simulation->toArray(), 
                "person_data" => [
                    "main_data" => $person->toArray(),
                    "addicional_data" => $personAddicional->toArray()             
                ], 
                "loan_data" => $loan->toArray()  
            ];
            array_push($simulations, $simulation);
        }

        return view('admin.data-template', ['dataArray' => $simulations]);
    }
}
