@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3>Listagem de categorias</h3>
            <div class="input-group">
                {!! Form::model(compact('search'), ['class'=>'form-inline', 'method' => 'GET']) !!}
                {!! Html::openFormGroup('title', $errors) !!}
                <div class="input-group">
                    <div class="input-group-btn">
                        {!! Button::primary('Nova Categoria')->asLinkTo(route('categories.create')) !!}
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
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-primary btn-xs" href="{{route('categories.edit',['category'=>$category->id])}}">Editar</a>
                                <a class="btn btn-danger btn-xs" href="{{route('categories.delete',['category'=>$category->id])}}" data-toggle="modal" data-target="#myModal">Excluir</a>
                            </div>
                        </td>
                    </tr>
                 @endforeach
                </tbody>
            </table>

            {{ $categories->links() }}
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
