@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>
        Chamados</h1>
@stop

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Novo Chamado</h3>
                    </div>
                    <form id="create" action="{{ route('chamados.novos_chamados_store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">
                                            Usuário solicitante
                                        </label>
                                        <input type="text" placeholder="ramal"
                                            class="form-control {{ $errors->has('usuario_id') ? 'is-invalid' : '' }}"
                                            id="usuario_id" name="usuario_id" value="{{ Auth::user()->name ?? old('usuario_id') }}" readonly>
                                        @if ($errors->has('usuario_id'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('usuario_id') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">
                                            Ramal
                                            <span class="red-text">*</span>
                                        </label>
                                        <input type="text" placeholder="ramal"
                                            class="form-control {{ $errors->has('ramal') ? 'is-invalid' : '' }}"
                                            id="ramal" name="ramal" value="{{ $chamado->ramal ?? old('ramal') }}">
                                        @if ($errors->has('ramal'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('ramal') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="setores">Setor <span class="red-text">*</span></label>
                                            <select class="form-control select2  {{ $errors->has('setor_id') ? 'is-invalid' : '' }}"
                                                style="width: 100%;" name="setor_id">
                                                <option selected value="">Selecione...</option>
                                                @foreach ($setores as $item)
                                                    <option @if (isset($chamado) && $chamado->setor_id == $item->id) selected @endif value="{{ $item->id }}">
                                                        {{ $item->nome }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('setor_id'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('setor_id') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="oficina">Oficina <span class="red-text">*</span></label>
                                            <select class="form-control select2  {{ $errors->has('oficina_id') ? 'is-invalid' : '' }}"
                                                style="width: 100%;" name="oficina_id" id="oficina_id">
                                                <option selected value="">Selecione...</option>
                                                @foreach ($oficinas as $oficina)
                                                    <option value="{{ $oficina->id }}">
                                                        {{ $oficina->nome }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('oficina_id'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('oficina_id') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="roles">Problema*</label>
                                        <select name="ocorrencia_id[]" id="ocorrencias" class="form-control select2">

                                        </select>
                                        @if ($errors->has('ocorrencia_id'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('ocorrencia_id') }}</strong>
                                        </div>
                                    @endif
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class=" form-group">
                                        <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                                            <label for="descricao">Descrição</label>
                                            <textarea style="resize: none;" id="descricao" name="descricao" rows="6"
                                                class="form-control">{{ old('descricao', isset($chamado) ? $chamado->descricao : '') }}</textarea>
                                            @if ($errors->has('descricao'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('descricao') }}</strong>
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

<script>
    $("#oficina_id").change(function() {
        $.ajax({
            url: "{{ route('get_ocorrencias') }}?oficina_id=" + $(this).val(),
            method: "GET",
            success: function(data) {
                $("#ocorrencias").html(data.html);
            },
        });
    });
</script>
@stop
