@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3>Editar usuário</h3>
            {{--@include('errors._errors_form')--}}

            {!! Form::model($user, ['route'=>['codeeduuser.users.update', 'user'=>$user->id], 'class'=>'form', 'method'=>'PUT']) !!}

                @include('codeeduuser::users.partials.form_users')

                {!! Html::openFormGroup() !!}
                    {!! Button::primary('Salvar')->submit() !!}
                {!! Html::closeFormGroup() !!}
            {!! Form::close() !!}

        </div>


    </div>


@endsection