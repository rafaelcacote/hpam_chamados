@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>
        Técnicos</h1>
@stop

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Lista de Técnicos</h3>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>

                <div class="card-tools">
                    <ul class="pagination pagination-sm float-right">

                    </ul>
                </div>
            </div>
            <div class="card-header">
                <form action="{{ route('tecnicos.index') }}" method="GET">
                    <div class="row">

                        <div class="col-sm-3">
                            <!-- text input -->
                            <div class="form-group">
                                <input type="text" class="form-control" name="search_tecnico"
                                    placeholder="Pesquisar por nome">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <!-- text input -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i>
                                    Pesquisar</button>
                                <a href="{{ route('tecnicos.index') }}" class="btn btn btn-warning mb-2"><i
                                        class="fa-solid fa-eraser"></i>
                                    Limpar
                                </a>
                            </div>
                        </div>
                </form>
                <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                        <a class="btn btn-success float-right" href="{{ route('tecnicos.create') }}"><i
                                class="fa-solid fa-plus"></i> Criar novo
                            técnico</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            @if ($data->isEmpty())
                <div class="alert alert-info col-6 offset-3 mt-2">
                    {{-- <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">×</button> --}}
                    <i class="icon fas fa-info"></i>
                    Nenhum!
                </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Oficinas</th>
                            <th>Ativo</th>
                            <th width="280px">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $tecnico)
                            <tr>

                                <td>{{ $tecnico->nome }}</td>
                                <td>

                                    @foreach ($tecnico->oficinas as $v)
                                        <label class="badge badge-secondary">{{ $v->nome }}</label>
                                    @endforeach

                                </td>
                                <td>
                                    @if ($tecnico->active == true)
                                        <span class="badge badge-success">Ativo</span>
                                    @else
                                        <span class="badge badge-danger">Inativo</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('tecnicos.show', $tecnico->id) }}"> <i
                                            class="fa-solid fa-eye"></i> Visualizar</a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('tecnicos.edit', $tecnico->id) }}"> <i
                                            class="fa-solid fa-pencil"></i> Editar</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">

            {{ $data->links('vendor.pagination.adminlte-paginate') }}

        </div>
    </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
