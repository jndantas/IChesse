@extends('adminlte::page')

@section('title', 'Cadastrar Novo Tenant')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Cadastrar Novo Tenant</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('tenants.index') }}" class="active">Empresas</a></li>
            </ol>
        </div>
    </div>
</div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tenants.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf

                @include('admin.pages.tenants._partials.form')
            </form>
        </div>
    </div>
@endsection
