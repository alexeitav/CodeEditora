@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3>Nova Role</h3>

            {!! Form::open(['route' => 'codeeduuser.roles.store', 'class' => 'form']) !!}

                @include('codeeduuser::roles.partials.form_roles')

                {!! Html::openFormGroup() !!}
                    {!! Button::primary('Criar')->submit() !!}
                {!! Html::closeFormGroup() !!}

            {!! Form::close() !!}

        </div>


    </div>


@endsection