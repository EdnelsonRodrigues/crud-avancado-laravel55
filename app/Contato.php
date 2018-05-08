<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Contato extends Model
{
    protected $fillable = [
			'status',
            'nome',
            'celular',
            'descricao'
	];
	
	//metodo para listar todos os contatos ativos
	public function listar()
	{
		DB::beginTransaction();
		//dd($contatos = Contato::where('status','Ativo')->get());
		$contatos = Contato::where('status','Ativo')->get();
		return $contatos;
	}

    //metodo para salvar um contato com transação no banco
    public function salvar($contato)
    {
		//dd($contato);
    	DB::beginTransaction();

    	$contato = Contato::create([
			'status' => 'Ativo',
    		'nome' => $contato['nome'],
    		'celular' => $contato['celular'],
    		'descricao' => $contato['descricao']
    	]);

		if($contato) {

			DB::commit();

			return [
				'success' => true,
				'message' => 'Sucesso ao cadastrar contato'
			];
		} else {

			DB::rollback();

			return [
				'success' => false,
				'message' => 'Falha ao cadastrar o contato'
			];
		}
    }
}
