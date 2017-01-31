@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3>Listagem de usuários</h3>
            <div class="input-group">
                {!! Form::model(compact('search'), ['class'=>'form-inline', 'method' => 'GET']) !!}
                {!! Html::openFormGroup('title', $errors) !!}
                <div class="input-group">
                    <div class="input-group-btn">
                        {!! Button::primary('Novo Usuário')->asLinkTo(route('codeeduuser.users.create')) !!}
                        {!! Button::success('Buscar')->submit() !!}
                    </div>
                    {!! Form::text('search',null, ['class'=>'form-control', 'placeholder'=>'pesquisar']) !!}
                </div>
                {!! Html::closeFormGroup() !!}
            </div>

        </div>

        <div class="row">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-primary btn-xs" href="{{route('codeeduuser.users.edit',['user'=>$user->id])}}">Editar</a>
                                @if($user->id != \Illuminate\Support\Facades\Auth::user()->id)
                                    <a class="btn btn-danger btn-xs" href="{{route('codeeduuser.users.delete',['user'=>$user->id])}}" data-toggle="modal" data-target="#myModal">Excluir</a>
                                @else
                                    <a class="btn btn-danger btn-xs disabled" href="" data-toggle="modal" data-target="#myModal">Excluir</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                 @endforeach
                </tbody>
            </table>

            {{ $users->links() }}
        </div>

    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

            </div>

        </div>
    </div>




@endsection
