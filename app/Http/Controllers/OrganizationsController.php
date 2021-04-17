<?php


namespace App\Http\Controllers;


use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrganizationsController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'statement' => 'required',
            'cnpj' => 'required|regex:/\d{14}/|unique:organizations', // @todo Validate CNPJ
            'email' => 'required|email|unique:organizations',
            'phone_number' => 'regex:/\d{8,11}/',
        ]);

        Organization::create($request->toArray());

        return response(null, Response::HTTP_CREATED);
    }
}