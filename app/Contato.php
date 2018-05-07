<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Contato extends Model
{
    protected $fillable = [
            'nome',
            'celular',
            'descricao'
    ];

    //metodo para salvar um contato com transação no banco
    public function salvar($contato)
    {
    	DB::beginTransaction();

    	$contato = Contato::create([
    		'nome' => $_POST["nome"],
    		'celular' => $_POST["celular"],
    		'descricao' => $_POST["descricao"]
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
