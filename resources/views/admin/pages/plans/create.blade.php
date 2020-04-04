@extends('adminlte::page')

@section('title', 'Novo Plano')

@section('content_header')

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Novo Plano</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}" class="active">Planos</a></li>
            </ol>
        </div>
    </div>
</div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" class="form" method="POST">
                @csrf
                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@endsection
