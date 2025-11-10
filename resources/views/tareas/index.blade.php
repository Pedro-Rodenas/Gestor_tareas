@extends('layouts.app')

@section('title', 'Tareas')

@section('content')

    <div class="card">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h2 style="font-size:1.3rem;">Listado de Tareas</h2>
            <button class="btn btn-primary" onclick="openModal()">Nueva tarea</button>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Estado</th>
                <th>F. Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($tareas as $tarea)
                <tr>
                    <td>{{ $tarea->id }}</td>
                    <td>{{ $tarea->titulo }}</td>
                    <td>{{ $tarea->completada ? 'Completado' : 'Proceso' }}</td>
                    <td>{{ $tarea->created_at }}</td>
                    <td style="display:flex; gap:6px;">

                        {{-- EDITAR --}}
                        <button class="btn btn-secondary edit-btn" data-id="{{ $tarea->id }}" data-titulo="{{ $tarea->titulo }}"
                            data-descripcion="{{ $tarea->descripcion }}" data-completada="{{ $tarea->completada }}">
                            Editar
                        </button>


                        {{-- ELIMINAR --}}
                        <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('¿Eliminar tarea?')">Eliminar</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- MODALES --}}
    @include('tareas.modal') {{-- Registrar --}}
    @include('tareas.modal_edit') {{-- Editar --}}

@endsection