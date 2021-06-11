@extends('layouts.template')

@section('title', 'home')
<header class="text-center mt-4">
    <h3>Crear una nueva Beca </h3>
</header>

<main class="container d-flex justify-content-center flex-wrap mt-4">
        {!! Form::open(['url' => '/becas', 'method' => 'post', 'files' => true, 'class' => 'd-flex flex-column w-50']) !!}

            <div class="form-group mt-3">
                {{ Form::label('noControl', 'No. Control') }}
                {{ Form::text('noControl', null, ['class' => 'form-control', 'placeholder' => '17030830']) }}
            </div>

            <div class="form-group mt-3">
                {{ Form::label('nombre', 'Nombre') }}
                {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Jorge']) }}
            </div>

            <div class="form-group mt-3">
                {{ Form::label('apellidos', 'Apellidos') }}
                {{ Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Patiño Garcia']) }}
            </div>

            <div class="form-group mt-3">
                {{ Form::label('carrera', 'Carrera') }}
                {{ Form::select('carrera', ['ISC' => 'Ing. Sistemas', 'IGE' => 'Ing. Gestión'], null, ['placeholder' => 'Seleccione una carrera', 'class' => 'form-control form-select']) }}
            </div>

            <div class="form-group mt-3">
                {{ Form::label('semestre', 'Semestre') }}
                <br>
                {{ Form::number('semestre', '1', null, ['min' => '1', 'max' => '13', 'class' => 'form-control']) }}
            </div>

            <div class="form-group mt-3">
                {{ Form::label('fechaNac', 'Fecha de Nacimiento') }}
                <br>
                {{ Form::date('fechaNac', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
            </div>

            <div class="form-group mt-3">
                {{ Form::label('genero', 'Genero') }}
                {{ Form::select('genero', ['F' => 'Femenino', 'M' => 'Masculino'], null, ['placeholder' => 'Seleccione su genero', 'class' => 'form-control form-select']) }}
            </div>

            <div class="form-group mt-3">
                {{ Form::label('domicilio', 'Domicilio') }}
                {{ Form::text('domicilio', null, ['class' => 'form-control', 'placeholder' => 'Allende #335']) }}
            </div>

            <div class="form-group mt-3">
                {{ Form::label('tipoBeca', 'Tipo de Beca') }}
                {{ Form::select('tipoBeca', ['Economica' => 'Beca Economica', 'Alimenticia' => 'Beca alimenticia'], null, ['placeholder' => 'Seleccione el tipo de beca', 'class' => 'form-control form-select']) }}
            </div>

            <div class="form-group mt-3">
                {{ Form::label('carta', 'Carta de motivos') }}
                @csrf
                {{ Form::file('carta', ['class' => 'form-control', 'accept' => '.pdf, .PDF']) }}
            </div>

            <div class="form-group mt-3">
                {{ Form::label('identificacion', 'identificacion') }}
                @csrf
                {{ Form::file('identificacion', ['class' => 'form-control', 'accept' => '.pdf, .PDF']) }}
            </div>

            <div class="form-group mt-3">
                {{ Form::label('compDomicilio', 'Comprobante de Domicilio') }}
                @csrf
                {{ Form::file('compDomicilio', ['class' => 'form-control', 'accept' => '.pdf, .PDF']) }}
            </div>

            <div class="form-group mt-3">
                {{ Form::submit('Enviar', ['class' => 'btn btn-success']) }}
            </div>

        {!! Form::close() !!}
</main>
@section('content')

@endsection