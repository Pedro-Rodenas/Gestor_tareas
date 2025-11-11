@extends('layouts.app')

@section('title', 'Tareas')

@section('content')
<style>
    .filtro {
        display: none;
    }
</style>

<div class="section">
    <div class="nav nav-movil">
        <a class="link" href="">
            <i class='bxr  bx-dashboard-alt'></i>
            Dashboard
        </a>
        <a class="link active" href="">
            <i class='bxr  bx-checkbox-checked'></i>
            Tareas
        </a>
    </div>

    <div class="header-content">
        <div class="header-content-title">
            <h2 class="h2">Mis Tareas</h2>
            <button class="btn btn-green" onclick="openModal()"> <i class='bxr  bx-plus-square'></i> Crear</button>
        </div>
        <form class="search-content" action="">
            <div class="search">
                <i class='bxr  bx-search'></i>
                <input class="control control-search" name="buscador" id="buscador" type="search" placeholder="Buscar Tarea">
            </div>
        </form>
    </div>
    <div class="filters-content">
        <button class="filter">
            <i class='bxr  bx-calendar-alt'></i>
            fecha
        </button>
        <button class="filter">
            Estado
            <i class='bxr  bx-chevron-down'></i>
        </button>
    </div>

    <div class="table-list">
        <h3 class="title-table">Todas las tareas</h3>
        <div class="table">
            @if($tareas->isEmpty())
            <div class="empty">
                <p class="empty-title">Oops... aún no registras tareas
                    <i class='bxr  bx-sad'></i>
                </p>
                <small>Empieza agregando tu primera tarea 🚀</small>
            </div>
            @else
            @foreach($tareas as $tarea)
            <div class="row item">
                <div class="cell-all">
                    <p class="task-title ellipsis-1">
                        {{ $tarea->titulo }}
                    </p>
                    <p class="task-fecha">
                        {{$tarea->created_at}}
                    </p>

                </div>

                <div class="cell cell-210 cell-compartido">
                    @if($tarea->prioridad == "Alta")
                    <p class="prioridad prioridad-alta">{{$tarea->prioridad}}</p>
                    @elseif($tarea->prioridad == "Medio")
                    <p class="prioridad prioridad-medio">{{$tarea->prioridad}}</p>
                    @else
                    <p class="prioridad prioridad-bajo">{{$tarea->prioridad}}</p>
                    @endif

                    @if($tarea->completada == null)
                    <p class="task-status task-proceso">En Proceso</p>

                    @elseif($tarea->completada == "0")
                    <p class="task-status task-proceso">En Proceso</p>
                    @else
                    <p class="task-status task-completado">Completado</p>
                    @endif
                </div>
                <div class="cell cell-actions">
                    {{-- EDITAR --}}
                    <button class="btn btn-secondary edit-btn" data-id="{{ $tarea->id }}" data-titulo="{{ $tarea->titulo }}"
                        data-descripcion="{{ $tarea->descripcion }}" data-completada="{{ $tarea->completada }}">
                        <i class='bxr  bx-edit'></i>
                    </button>
                    {{-- ELIMINAR --}}
                    <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger delete-btn" onclick="return confirm('¿Eliminar tarea?')"><i class='bxr  bx-trash'></i> </button>
                    </form>

                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>

</div>


{{-- MODALES --}}
@include('tareas.modal') {{-- Registrar --}}
@include('tareas.modal_edit') {{-- Editar --}}

@endsection