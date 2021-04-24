<?php

namespace App\Http\Controllers;

use App\Models\CheckRequest;
use App\Models\Contact;
use App\Models\LoanRequest;
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

            $loan->warranty = $loan->Warranty()->first()->warranty_name;
            unset($loan->warranty_id);

            $loan->segment = $loan->Segment()->first()->segment_name;
            unset($loan->segment_id);
            
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
        $loans = [];     
        foreach (LoanRequest::all() as $loanRequest){
            $person = $loanRequest->person()->first();
            $personAddicional = $person->additionalData()->first();
            $loan = $loanRequest->loan()->first();
            $loanRequest = [
                "title" => "Pedido de empréstimo $loanRequest->id",
                "Dados pessoais" => [
                    "main_data" => $person->toArray(),
                    "addicional_data" => $personAddicional->toArray()             
                ], 
                "Dados do empréstimo" => $loan->toArray()  
            ];
            array_push($loans, $loanRequest);
        }

        return view('admin.data-template', ['dataArray' => $loans]);
    }

    public function cheques(){  
        $checkRequests = [];     
        foreach (CheckRequest::all() as $check){
            $person = $check->person()->first();
            $personAddicional = $person->additionalData()->first();
            $check = $check->Check()->first();
            $check = [
                "title" => "Pedido de desconto de título $check->id",
                "Dados pessoais" => [
                    "main_data" => $person->toArray(),
                    "addicional_data" => $personAddicional->toArray()             
                ], 
                "Dados do título" => $check->toArray()  
            ];
            array_push($checkRequests, $check);
        }

        return view('admin.data-template', ['dataArray' => $checkRequests]);
    }
}
