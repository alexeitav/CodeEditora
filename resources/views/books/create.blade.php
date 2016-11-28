@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3>Novo livro</h3>

            {!! Form::open(['route' => 'books.store', 'class' => 'form']) !!}

                @include('books.partials.form_books')

                {!! Html::openFormGroup() !!}
                    {!! Form::submit('Criar', ['class'=>'btn btn-primary']) !!}
                {!! Html::closeFormGroup() !!}

            {!! Form::close() !!}

        </div>


    </div>


@endsection