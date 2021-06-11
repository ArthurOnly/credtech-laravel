<?php

namespace App\Http\Controllers;

use App\Models\CheckRequest;
use App\Models\Contact;
use App\Models\LoanRequest;
use App\Models\SimulationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        return redirect()->route('admin.panel');
    }
    public function panel(){
        $numberOfSimulations = SimulationRequest::count();
        $numberOfContacts = Contact::count();
        $numberOfLoans = LoanRequest::count();
        $numberOfChecks = CheckRequest::count();
        return view('admin.panel', [
            'totalSimulations' => $numberOfSimulations,
            'totalLoans' => $numberOfLoans,
            'totalContacts' => $numberOfContacts,
            'totalChecks' => $numberOfChecks
            ]);
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
                "Dados do empréstimo" => $loan->toArray(),
                "Documentos" => [
                    "Comprovante de ganhos mensais" => $person->doc_monthly_income,
                    "Verso RG" => $person->doc_rg_verse,
                    "Selfie" => $person->doc_selfie,
                    "Comprovante de endereço" => $person->doc_address_comp,
                ]  
            ];
            array_push($loans, $loanRequest);
        }

        return view('admin.data-template', ['dataArray' => $loans]);
    }

    public function downloadDoc($docname){
        $file = Storage::get('docs/'.$docname);
        return $file;
    }

    public function cheques(){  
        $checkRequests = [];     
        foreach (CheckRequest::all() as $checkRequest){
            $person = $checkRequest->person()->first();
            $personAddicional = $person->additionalData()->first();           
            $check = $checkRequest->Check()->first();

            $checkRequest = [
                "title" => "Pedido de desconto de título $checkRequest->id",
                "Dados pessoais" => [
                    "main_data" => $person->toArray(),
                    "addicional_data" => $personAddicional->toArray()             
                ], 
                "Dados do título" => $check->toArray(),
                "Documentos" => [
                    "Verso título" => $check->doc_back,
                    "Frente título" => $check->doc_front,
                ]
            ];
            array_push($checkRequests, $checkRequest);
        }

        return view('admin.data-template', ['dataArray' => $checkRequests]);
    }
}
