@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Oficinas</h1>
@stop

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Visualizar Oficinas</h3>
                        </div>

                        <div class="card-body pb-0">
                            <div class="card">
                                <div class="card-body p-0">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td width="200px"><strong>Nome:</strong></td>
                                                <td>{{ $oficina->nome }}</td>
                                            </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>
                        <div class="card-footer">
                            <a href="{{ route('oficinas.index') }}" class="btn btn btn-secondary m-1 float-right">
                                <i class="fas fa-arrow-left"></i>
                                Voltar
                            </a>
                            <a href="{{ route('oficinas.edit', $oficina->id) }}"
                                class="btn btn btn-primary m-1 float-right">
                                <i class="fa-solid fa-pencil"></i>
                                Editar
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
