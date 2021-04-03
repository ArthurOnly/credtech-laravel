<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Simulation;

class SimulationsController extends Controller
{
    private function addRelations($simulation){
        $warranty = $simulation->warranty();
        $segment = $simulation->segment();

        $simulation['warranty'] = $warranty;
        $simulation['segment'] = $segment;
        return $simulation;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $simulations = Simulation::all();
        foreach($simulations as $simulation){
           $simulation = $this->addRelations($simulation);
        }
        return $simulations;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Simulation::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $simulation = Simulation::findOrFail($id);
        $simulation = $this->addRelations($simulation);
        return $simulation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Simulation = Simulation::findOrFail($id);
        $Simulation->delete();
    }
}
