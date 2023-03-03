@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuário</h1>
@stop

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
            <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Editar Usuário</h3>
                </div>
                <form action="{{ route('users.update',$user->id) }}" method="post">
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
                                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                                            name="name" value="{{ $user->name ?? old('name') }}">
                                        @if ($errors->has('name'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">
                                            Email
                                        </label>
                                        <input type="email" placeholder="email"
                                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email"
                                            name="email" value="{{ $user->email ?? old('email') }}">
                                        @if ($errors->has('email'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                            <label for="password">Senha</label>
                                            <input type="password" id="password" name="password" class="form-control">
                                            @if ($errors->has('password'))
                                                <p class="help-block">
                                                    {{ $errors->first('password') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('confirm-password') ? 'has-error' : '' }}">
                                            <label for="confirm-password">Confirmar Senha</label>
                                            <input type="password" id="confirm-password" name="confirm-password" class="form-control">
                                            @if ($errors->has('confirm-password'))
                                            <p class="help-block" style="color: red">
                                                    {{ $errors->first('confirm-password') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>


                                <div class="col-sm-12">
                                    <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                                        <label for="roles">Perfil*</label>
                                        <select name="roles[]" id="roles" class="form-control select2-multiple" multiple="multiple">
                                            @foreach ($roles as $id => $roles)
                                                <option value="{{ $id }}"
                                                    {{ in_array($id, old('roles', [])) || (isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>
                                                    {{ $roles }}
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
                                <div class="col-sm-6">
                                    <div class="form-group custom-control custom-switch">
                                        <input type="hidden" name="active" value="0">
                                        <input type="checkbox" name="active" class="custom-control-input" id="customSwitch1" value="1" @if ($user->active == true) checked @endif>
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
                        <a href="{{ route('users.index') }}" class="btn btn btn-secondary m-1 float-right">
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
    <script> console.log('Hi!'); </script>
@stop
