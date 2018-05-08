<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContatoFormRequest;
use App\Contato;

class ContatoController extends Controller
{
    public function index(Contato $contato)
    {
		$contatos = $contato->listar();
		//dd($contatos);
		return view('contatos.index', compact('contatos'));
    }

    public function novo()
    {
    	return view('contatos.novo');
    }

    public function store(ContatoFormRequest $request, Contato $contato)
	{
		//dd($contato->salvar($request->all()));
		$result = $contato->salvar($request->all());

		//mostrar a mensagem para o usuario na view index
		if ($result['success'])
			return redirect()
						->route('contatos.index')
						->with('success', $result['message']);

			return redirect()
						->back()
						->with('error', $result['message']);

	}
}
