@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3>Nova categoria</h3>
            {{--@include('errors._errors_form')--}}

            {!! Form::model($category, ['route'=>['categories.update', 'category'=>$category->id], 'class'=>'form', 'method'=>'PUT']) !!}

                @include('categories.partials.form_categories')

                {!! Html::openFormGroup() !!}
                {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
                {!! Html::closeFormGroup() !!}
            {!! Form::close() !!}

        </div>


    </div>


@endsection