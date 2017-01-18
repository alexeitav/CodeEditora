@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3>Livro - {{ $book->title }}</h3>
            <ul class="list-group">

                <li class="list-group-item">
                    <strong>Titulo</strong>
                </li>
                <li class="list-group-item">
                    {{ $book->title }}
                </li>
                <li class="list-group-item">
                    <strong>Sub titulo</strong>
                </li>
                <li class="list-group-item">
                    {{ $book->subtitle }}
                </li>
                <li class="list-group-item">
                    <strong>Preço</strong>
                </li>
                <li class="list-group-item">
                    {{ $book->price }}
                </li>
                <li class="list-group-item">
                    <strong>Categorias</strong>
                </li>
                <li class="list-group-item">
                    {{ $book->categories->implode('name_trashed', ', ') }}
                </li>

            </ul>
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
