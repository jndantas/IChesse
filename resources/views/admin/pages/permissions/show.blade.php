@extends('adminlte::page')

@section('title', "Detalhes da permissão {$permission->name}")

@section('content_header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detalhes da permissão <b>{{ $permission->name }}</b></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}" class="active">Permissões</a></li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $permission->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $permission->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O PERFIL: {{ $permission->name }}</button>
            </form>
        </div>
    </div>
@endsection
