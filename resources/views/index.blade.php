@extends('layouts.template')

@section('title', 'home')

@section('content')
    <header class="text-center mt-4">
        <h3>Control de Becas </h3>
    </header>
    
    <main class="container-fluid d-flex flex-row-reverse flex-wrap">
        <a href="{{ route('becas.create') }}" class="btn btn-success">Crear</a>
        <table class="table text-center table-bordered mt-4"> 
            <thead class="table-dark">
                <tr>
                    <th>No. Control</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Carrera</th>
                    <th>Semestre</th>
                    <th>Fecha Nacimiento</th>
                    <th>Genero</th>
                    <th>Domicilio</th>
                    <th>Beca</th>
                    <th>Carta</th>
                    <th>Identificación</th>
                    <th>Comprobante Domicilio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->noControl }}</td>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellidos }}</td>
                        <td>{{ $alumno->carrera }}</td>
                        <td>{{ $alumno->semestre }}</td>
                        <td>{{ $alumno->fechaNac }}</td>
                        <td>{{ $alumno->genero }}</td>
                        <td>{{ $alumno->domicilio }}</td>
                        <td>{{ $alumno->tipoBeca }}</td>
                        <td><a href="{{Storage::disk('s3')->url('docs/cartas/'.$alumno->carta)}}" class="btn btn-secondary">Ver...</a></td>
                        <td><a href="{{Storage::disk('s3')->url('docs/identificaciones/'.$alumno->identificacion)}}" class="btn btn-secondary">Ver...</a></td>
                        <td><a href="{{Storage::disk('s3')->url('docs/comprobantesDomicilio/'.$alumno->compDomicilio)}}" class="btn btn-secondary">Ver...</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection