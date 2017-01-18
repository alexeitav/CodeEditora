@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3>Lixeira de livros</h3>

            <div class="input-group">
                {!! Form::model(compact('search'), ['class'=>'form-inline', 'method' => 'GET']) !!}
                {!! Html::openFormGroup('title', $errors) !!}
                <div class="input-group">
                    <div class="input-group-btn">
                        {!! Button::success('Buscar')->submit() !!}
                    </div>
                {!! Form::text('search',null, ['class'=>'form-control', 'placeholder'=>'pesquisar']) !!}
                </div>
                {!! Html::closeFormGroup() !!}
            </div>
        </div>
        <br/>

        @if($books->count() > 0)

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
                                    <a class="btn btn-primary btn-xs" href="{{route('trashed.books.show',['book'=>$book->id])}}">Ver</a>
                                    <a class="btn btn-danger btn-xs" href="{{route('trashed.books.undelete',['book'=>$book->id])}}" data-toggle="modal" data-target="#myModal">Restaurar</a>
                                 @else
                                    <a class="btn btn-default btn-xs" disabled="disabled" href="javascript:;">Ver</a>
                                    <a class="btn btn-default btn-xs" disabled="disabled" href="javascript:;">Restaurar</a>
                                 @endif
                            </div>
                        </td>
                    </tr>
                 @endforeach
                </tbody>
            </table>

            {{ $books->links() }}
        </div>

        @else

            <div class="well well-lg"><b>Nao existem livros na lixeira</b></div>

        @endif
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
