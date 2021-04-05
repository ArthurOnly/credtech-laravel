<?php

namespace App\Http\Controllers;

use App\Models\SimulationRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return 'inex';
    }
    public function panel(){
        $numberOfSimulations = SimulationRequest::count();
        return view('admin', ['totalSimulations' => $numberOfSimulations]);
    }

    public function simulacoes(){
        $simulations = [];
        
        foreach (SimulationRequest::all() as $simulation){
            $person = $simulation->person();
            $personAddicional = $person->additionalData();
            $loan = $simulation->loan();
            $simulation = [
                "simulation_request" => $simulation->toArray(), 
                "person_data" => [
                    "main_data" => $person->toArray(),
                    "addicional_data" => $personAddicional->toArray()             
                ], 
                "loan_data" => $loan->toArray()  
            ];
            array_push($simulations, $simulation);
        }

        return view('admin-simulacoes', ['simulations' => $simulations]);
    }
}
