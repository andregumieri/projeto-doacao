<?php


namespace App\Http\Controllers;


use App\Models\Organizacao;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrganizacoesController extends Controller
{
    /**
     * Creates a new organization
     *
     * @route POST /v1/organizations
     * @param Request $request
     * @return Response|\Laravel\Lumen\Http\ResponseFactory
     * @throws \Illuminate\Validation\ValidationException
     */
    public function criar(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required',
            'cnpj' => 'required|regex:/\d{14}/|unique:organizacoes', // @todo Validar CNPJ
            'email' => 'required|email|unique:organizacoes',
            'telefone' => 'regex:/\d{8,11}/',
        ]);

        Organizacao::create($request->toArray());

        return response(null, Response::HTTP_CREATED);
    }
}
