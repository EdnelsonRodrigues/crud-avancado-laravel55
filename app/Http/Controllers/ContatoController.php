<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contato;

class ContatoController extends Controller
{
    public function index()
    {
    	$contatos = Contato::all();
    	return view('contatos.index', compact('contatos'));
    }

    public function novo()
    {
    	return view('contatos.novo');
    }

    public function store(Request $request, Contato $contato)
	{

		$val = $this->validate($request, [
			'nome' => 'required',
			'celular' => 'required',
			'descricao' => 'required'
		]);

		//dd($contato->salvar($val));

		$result = $contato->salvar($val);

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
