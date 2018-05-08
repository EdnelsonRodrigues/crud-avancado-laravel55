<!-- mensagem de sucesso -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<!-- mensagem de sucesso -->

<!-- mensagem de erro -->
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<!-- mensagem de erro -->

<!-- mensagem de erro de validacao -->
@if ($errors->any())
    <div class="alert alert-warning">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
<!-- fim mensagem de erro de validacao -->