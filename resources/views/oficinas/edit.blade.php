@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Oficina</h1>
@stop

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Editar Oficina</h3>
                        </div>
                        <form action="{{ route('oficinas.update', $oficina->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body pb-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name">
                                                    Nome
                                                    <span class="red-text">*</span>
                                                </label>
                                                <input type="text" placeholder="Nome"
                                                    class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                                                    id="nome" name="nome"
                                                    value="{{ $oficina->nome ?? old('nome') }}">
                                                @if ($errors->has('nome'))
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $errors->first('nome') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('oficinas.index') }}" class="btn btn btn-secondary m-1 float-right">
                                    <i class="fas fa-arrow-left"></i>
                                    Voltar
                                </a>
                                <button type="submit" class="btn btn btn-primary m-1 float-right">
                                    <i class="fas fa-check"></i>
                                    Editar
                                </button>
                            </div>
                        </form>
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
