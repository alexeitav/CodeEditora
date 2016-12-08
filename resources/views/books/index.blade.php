@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3>Listagem de livros</h3>

            <div class="input-group">
                {!! Form::model(compact('search'), ['class'=>'form-inline', 'method' => 'GET']) !!}
                {!! Html::openFormGroup('title', $errors) !!}
                <div class="input-group">
                    <div class="input-group-btn">
                        {!! Button::primary('Novo Livro')->asLinkTo(route('books.create')) !!}
                        {!! Button::success('Buscar')->submit() !!}
                    </div>
                {!! Form::text('search',null, ['class'=>'form-control', 'placeholder'=>'pesquisar']) !!}
                </div>
                {!! Html::closeFormGroup() !!}
            </div>
        </div>
        <br/>

        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Subtitulo</th>
                    <th>Autor</th>
                    <th>Preço</th>
                    <th>Açoes</th>
                </tr>
                </thead>

                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->subtitle }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>{{ $book->price }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                @if($book->author_id == Auth::user()->id)
                                    <a class="btn btn-primary btn-xs" href="{{route('books.edit',['book'=>$book->id])}}">Editar</a>
                                    <a class="btn btn-danger btn-xs" href="{{route('books.delete',['book'=>$book->id])}}" data-toggle="modal" data-target="#myModal">Excluir</a>
                                 @else
                                    <a class="btn btn-default btn-xs" disabled="disabled" href="javascript:;">Editar</a>
                                    <a class="btn btn-default btn-xs" disabled="disabled" href="javascript:;">Excluir</a>
                                 @endif
                            </div>
                        </td>
                    </tr>
                 @endforeach
                </tbody>
            </table>

            {{ $books->links() }}
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
