@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Planos</h1>
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
    <div class="card-header">
        <div class="card-tools">
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
            @csrf
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="filter" class="form-control float-right" placeholder="Nome" value="{{ $filters['filter'] ?? '' }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <a href="{{ route('plans.create') }}" class="btn btn-dark">Novo</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th width="250">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plans as $plan)
                    <tr>
                        <td>
                            {{ $plan->name }}
                        </td>
                        <td>
                            R$ {{ number_format($plan->price, 2, ',', '.') }}
                        </td>
                        <td style="width=10px;">
                            <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-primary">Detalhes</a>
                            <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-info">Editar</a>
                            <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">VER</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
        {!! $plans->appends($filters)->links() !!}
        @else
        {!! $plans->links() !!}
        @endif
    </div>
</div>
@stop
