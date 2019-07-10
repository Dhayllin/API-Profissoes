@extends('adminlte::page')

@section('title', 'Usuários - Editar')

@section('content_header')
    <h1>Usuários</h1>
@stop
@section('content')
<div class="row">   
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
                <form action="{{ route('users.update',$user) }}" method="post">
                    <input type="hidden" name="_method" value="PATCH">

                    {!! csrf_field() !!}
    
                    <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                               placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                               placeholder="{{ trans('adminlte::adminlte.email') }}">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>                
                    <div class="form-group has-feedback {{ $errors->has('professions') ? 'has-error' : '' }}">
                    <select id="professions" name="professions[]" data-live-search="true" multiple="multiple" class="form-control selectpicker" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                        @foreach ($professions as $item)
                            <option value="{{$item->id}}"
                                @foreach ($professions_user as $profession_user)
                                    @if( $item->id == $profession_user->id) {{ 'selected' }} @endif                                                            
                                @endforeach>    
                                {{$item->name}}
                            </option>                      
                        @endforeach
                      </select>
                    </div>                   
                    <button type="submit" class="btn btn-success btn-block btn-flat"  >Salvar</button>
                </form>              
            </div>      
        </div>
    </div>
</div>
@stop