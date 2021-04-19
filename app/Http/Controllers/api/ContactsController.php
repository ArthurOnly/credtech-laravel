<?php

namespace App\Http\Controllers\api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        //Verify data
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'celphone' => 'required',
            'message' => 'required',
        ]);

        if (!$validated){
            $response = ResponseHelper::format_response(False, null, 'Dados inválidos.');
            return $response;
        }

        Contact::create($validated);

        $response = ResponseHelper::format_response(True, null, 'Sucesso.');
        return $response;
    }
}
