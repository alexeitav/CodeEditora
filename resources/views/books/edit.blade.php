@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3>Nova categoria</h3>
            {{--@include('errors._errors_form')--}}

            {!! Form::model($book, ['route'=>['books.update', 'book'=>$book->id], 'class'=>'form', 'method'=>'PUT']) !!}

                @include('books.partials.form_books')

                {!! Html::openFormGroup() !!}
                {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
                {!! Html::closeFormGroup() !!}

            {!! Form::close() !!}

        </div>


    </div>


@endsection