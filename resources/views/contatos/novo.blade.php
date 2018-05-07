@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inserir novo contato
                    <a href="{{ route('contatos.index') }}" class="btn btn-success btn-xs pull-right">
                        <i class="fa fa-reply"></i> 
                        ir para a lista
                    </a>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <!-- mensagem de erro -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- fim mensagem de erro -->

                    <!-- form para adiconar novo contato -->
                    <form action="{{ route('contatos.store') }}" method="POST">
                    {{ csrf_field() }}
                        <div class="form-group form-group-sm">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control input-sm">
                        </div>

                        <div class="form-group form-group-sm">
                            <label>Celular</label>
                            <input type="text" name="celular" class="form-control input-sm">
                        </div>

                        <div class="form-group form-group-sm">
                            <label>Descrição</label>
                            <textarea  name="descricao" class="form-control input-sm" rows="2" cols="3"></textarea>
                        </div>

                        <div class="form-group form-group-sm">
                            <button type="submit" class="btn btn-success btn-xs">
                                <i class="fa fa-paper-plane"></i>
                                Cadastrar
                            </button>
                        </div>
                    </form>
                    <!-- form para adiconar novo contato -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection