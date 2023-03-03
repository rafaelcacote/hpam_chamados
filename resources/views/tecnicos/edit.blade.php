@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Técnico</h1>
@stop

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Editar Tecnico</h3>
                        </div>
                        <form action="{{ route('tecnicos.update', $tecnico->id) }}" method="post">
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
                                                    value="{{ $tecnico->nome ?? old('nome') }}">
                                                @if ($errors->has('nome'))
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $errors->first('nome') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="email">
                                                    Matrícula
                                                </label>
                                                <input type="matricula" placeholder="matricula"
                                                    class="form-control {{ $errors->has('matricula') ? 'is-invalid' : '' }}"
                                                    id="matricula" name="matricula"
                                                    value="{{ $tecnico->matricula ?? old('matricula') }}">
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
                                                <select name="oficinas[]" id="oficinas"
                                                    class="form-control select2-multiple" multiple="multiple">
                                                    @foreach ($oficinas as $id => $oficinas)
                                                        <option value="{{ $id }}"
                                                            {{ in_array($id, old('oficinas', [])) || (isset($tecnico) && $tecnico->oficinas->contains($id)) ? 'selected' : '' }}>
                                                            {{ $oficinas }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('oficinas'))
                                                    <p class="help-block" style="color: red">
                                                        {{ $errors->first('oficinas') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group custom-control custom-switch">
                                                <input type="hidden" name="active" value="0">
                                                <input type="checkbox" name="active" class="custom-control-input"
                                                    id="customSwitch1" value="1"
                                                    @if ($tecnico->active == true) checked @endif>
                                                <label class="custom-control-label" for="customSwitch1">Ativo</label>
                                            </div>


                                            {{-- <label>
                                        <input type="hidden" name="active" value="0">
                                        <input type="checkbox" name="active" value="1" class="minimal"
                                            id="icheck" @if ($user->active == true) checked @endif>
                                        Ativo
                                    </label> --}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('tecnicos.index') }}" class="btn btn btn-secondary m-1 float-right">
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
