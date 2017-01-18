@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3>Novo livro</h3>

            {!! Form::open(['route' => 'books.store', 'class' => 'form']) !!}

                @include('codeedubook::books.partials.form_books')

                {!! Html::openFormGroup() !!}
                    {!! Button::primary('Criar')->submit() !!}
                {!! Html::closeFormGroup() !!}

            {!! Form::close() !!}

        </div>


    </div>


@endsection