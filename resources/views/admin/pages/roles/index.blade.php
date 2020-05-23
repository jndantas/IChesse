@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cargos </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}" class="active">Cargos</a></li>
                </ol>
            </div>
        </div>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <form action="{{ route('roles.search') }}" method="POST" class="form form-inline">
                    @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <a href="{{ route('roles.create') }}" class="btn btn-dark">Novo</a>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="200">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>
                            {{ $role->name }}
                        </td>
                        <td style="width=10px;">
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning">VER</a>
                            <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-warning"><i class="fas fa-lock"></i></a>                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $roles->appends($filters)->links() !!}
            @else
                {!! $roles->links() !!}
            @endif
        </div>
    </div>
@stop
