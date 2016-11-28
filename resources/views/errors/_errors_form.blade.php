@if ($errors->any())
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <strong>Erro!</strong> Verifique as mensagens abaixo
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error  }}</li>
            @endforeach
        </ul>
    </div>
@endif