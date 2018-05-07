@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contatos 
                	<a href="{{ route('contatos.novo') }}" class="btn btn-success btn-xs pull-right">
                		<i class="fa fa-plus"></i> 
                		Novo
                	</a>
                </div>

                <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                   	<!-- table striped -->
                   	<table class="table table-striped table-condensed">
                    	<thead>
                    		<tr>
                    			<th>Nome</th>
                    			<th>Celular</th>
                    			<th>Descrição</th>
                    			<th>Ações</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		@foreach($contatos as $contato)
                    		<tr>
                    			<td>{{ $contato->nome }}</td>
                    			<td>{{ $contato->celular }}</td>
                    			<td>{{ $contato->descricao }}</td>
                    			<td>
                    				<button class="btn btn-primary btn-xs">
                    					<i class="fa fa-pencil-alt"></i>
                    				</button>

                    				<button class="btn btn-danger btn-xs">
                    					<span class="fa fa-trash"></span>
                    				</button>
                    			</td>
                    		</tr>
                    		@endforeach
                    	</tbody>
                   	</table>
                   	<!-- table striped -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection