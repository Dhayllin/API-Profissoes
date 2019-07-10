@extends('adminlte::page')

@section('title', 'Usuários - Novo')

@section('content_header')
    <h1>Usuários</h1>
@stop
@section('content')
<div class="row">
    @if(Session::has('mensagem_erro'))
        <div class="alert alert-success">{{ Session::get('mensagem_erro')}}</div>
    @endif      
    <div class="col-md-8 col-md-offset-2">
        <div class="box col-md-4 ">
            <div class="box-header with-border">
            <h3 class="box-title"> Informe os dados do Usuário </h3>
            <div class="box-tools">
                <div class="input-group-btn">
                    <button type="button" onclick="window.history.go(-1); return false;"  class="btn btn-success"><i class="fa fa-window-close"></i> fechar</button> 
                </div>
            </div>
            </div>           
            <div class="register-box-body">   
                <form action="{{ route('users.store') }}" method="post">
                    {!! csrf_field() !!}
    
                    <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                               placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                               placeholder="{{ trans('adminlte::adminlte.email') }}">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input type="password" name="password" class="form-control"
                               placeholder="{{ trans('adminlte::adminlte.password') }}">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <input type="password" name="password_confirmation" class="form-control"
                               placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span> 
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('professions') ? 'has-error' : '' }}">
                    <select  id="professions" name="professions[]" data-live-search="true" multiple="multiple" class="form-control selectpicker" style="width: 100%; font-color:red" tabindex="-1" aria-hidden="true" >
                        @foreach ($professions as $item)
                        <option value="{{$item->id}}" @if(old('professions') == $item->id) {{ 'selected' }} @endif>{{$item->name}}</option>                           
                        @endforeach
                      </select>
                    </div>        
                    <button type="submit" class="btn btn-success btn-block btn-flat"  >Salvar</button>
                </form>              
            </div>      
        </div>
    </div>
</div>
<script> 
</script>
@stop