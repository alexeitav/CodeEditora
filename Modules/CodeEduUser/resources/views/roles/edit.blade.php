@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3>Editar Role</h3>
            {{--@include('errors._errors_form')--}}

            {!! Form::model($role, ['route'=>['codeeduuser.roles.update', 'role'=>$role->id], 'class'=>'form', 'method'=>'PUT']) !!}

                @include('codeeduuser::roles.partials.form_roles')

                {!! Html::openFormGroup() !!}
                    {!! Button::primary('Salvar')->submit() !!}
                {!! Html::closeFormGroup() !!}
            {!! Form::close() !!}

        </div>


    </div>


@endsection