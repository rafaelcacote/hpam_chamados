@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tecnicos</h1>
@stop

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Cadastro de Técnico</h3>
                        </div>
                        <form id="create" action="{{ route('tecnicos.store') }}" method="post">
                            @csrf
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
                                                id="nome" name="nome" value="{{ $tecnico->nome ?? old('nome') }}">
                                            @if ($errors->has('nome'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('nome') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="matricula">
                                                Matricula
                                            </label>
                                            <input type="matricula" placeholder="matricula"
                                                class="form-control {{ $errors->has('matricula') ? 'is-invalid' : '' }}"
                                                id="matricula" name="matricula"
                                                value="{{ $tecnico->email ?? old('matricula') }}">
                                            @if ($errors->has('matricula'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('matricula') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>




                                    <div class="col-sm-12">
                                        <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                                            <label for="roles">Oficinas*</label>
                                            <select name="oficinas[]" id="roles" class="form-control select2-multiple"
                                                multiple="multiple">
                                                @foreach ($oficinas as $id => $oficinas)
                                                    <option value="{{ $id }}"
                                                        {{ in_array($id, old('oficinas', [])) ? 'selected' : '' }}>
                                                        {{ $oficinas }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('roles'))
                                                <p class="help-block" style="color: red">
                                                    {{ $errors->first('roles') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('tecnicos.index') }}" class="btn btn btn-secondary m-1 float-right">
                                    <i class="fas fa-arrow-left"></i>
                                    Voltar
                                </a>
                                <button type="submit" class="btn btn btn-success m-1 float-right">
                                    <i class="fas fa-check"></i>
                                    Salvar
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
