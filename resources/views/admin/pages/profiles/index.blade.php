@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Perfis </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" class="active">Perfis</a></li>
            </ol>
        </div>
    </div>
</div>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
                    @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="filter" class="form-control float-right" placeholder="Nome" value="{{ $filters['filter'] ?? '' }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>

                </form>
            </div>
            <a href="{{ route('profiles.create') }}" class="btn btn-dark">Novo</a>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                            <td style="width=10px;">
                                {{-- <a href="{{ route('details.profile.index', $profile->url) }}" class="btn btn-primary">Detalhes</a> --}}
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop
