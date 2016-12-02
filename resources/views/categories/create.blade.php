@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3>Nova categoria</h3>

            {!! Form::open(['route' => 'categories.store', 'class' => 'form']) !!}

                @include('categories.partials.form_categories')

                {!! Html::openFormGroup() !!}
                    {!! Button::primary('Criar')->submit() !!}
                {!! Html::closeFormGroup() !!}

            {!! Form::close() !!}

        </div>


    </div>


@endsection