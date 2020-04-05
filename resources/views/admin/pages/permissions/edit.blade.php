@extends('adminlte::page')

@section('title', "Editar a Permissão {$permission->name}")

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Editar a Permissão {{ $permission->name }}</h1>
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
            <form action="{{ route('permissions.update', $permission->id) }}" class="form" method="POST">
                @method('PUT')

                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>
@endsection
