@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3>Listagem de livros</h3>
            <a href="{{ route('books.create') }}" class="btn btn-primary">Novo Livro</a>
        </div>

        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Subtitulo</th>
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
                        <td>{{ $book->price }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-primary btn-xs" href="{{route('books.edit',['book'=>$book->id])}}">Editar</a>
                                <a class="btn btn-danger btn-xs" href="{{route('books.delete',['book'=>$book->id])}}" data-toggle="modal" data-target="#myModal">Excluir</a>
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
