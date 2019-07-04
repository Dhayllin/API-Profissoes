@extends('adminlte::page')

@section('title', 'Profissões - Editar')

@section('content_header')
    <h1>Profissões</h1>
@stop
@section('content')
<div class="row">     
    <div class="col-md-8 col-md-offset-2">
        <div class="box col-md-4 ">
            <div class="box-header with-border">
            <h3 class="box-title"> Dados da Profissão </h3>
            <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 10px;">
                    <div class="input-group-btn">
                        <button type="button" onclick="window.history.go(-1); return false;"  class="btn btn-success"><i class="fa fa-window-close"></i> fechar</button> 
                    </div>
                </div>
            </div>
            </div>           
            <div class="register-box-body">
                <form action="{{ route('professions.update',$profession) }}" method="post">
                    <input type="hidden" name="_method" value="PATCH">
                    
                    {!! csrf_field() !!}
    
                    <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                        <input type="text" name="name" class="form-control" value="{{ $profession->name}}"
                               placeholder="Nome">                       
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>    
                    <div class="form-group has-feedback {{ $errors->has('description') ? 'has-error' : '' }}">
                        <input type="text" name="description" class="form-control" value="{{ $profession->description }}"
                                placeholder="Descrição">                            
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>   
                    <button type="submit" class="btn btn-success btn-block btn-flat">Salvar</button> 
                </form>              
            </div>      
        </div>
    </div>
</div>
@stop