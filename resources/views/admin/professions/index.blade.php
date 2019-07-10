@extends('adminlte::page')

@section('title', 'encontreApp - Profissões')

@section('content_header')
    <h1>Profissões</h1>
@stop

@section('content')
<div class="box">
    @if(Session::has('mensagem_sucesso'))
      <div class="alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
    @endif 
    @if(Session::has('mensagem_erro'))
      <div class="alert alert-danger">{{ Session::get('mensagem_erro')}}</div>
    @endif 
    <div class="box-header with-border">
      <div class="box-tools">
          <div class="input-group input-group-sm" style="width: 10px;">
              <div class="input-group-btn">
              <a href="{{route('professions.create')}}" class="btn btn-primary">Novo&nbsp;<i class="fa fa-plus"></i></a>
              </div>
          </div>
      </div>
    </div>
    <div class="box-body">
      <table id="example" class="table table-bordered table-striped">
        <thead>
          <tr>
              <th>Nome</th>
              <th>Descrição</th>             
              <th><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
              <th><i class="fa fa-trash" aria-hidden="true"></i></th>              
          </tr>
        </thead>
        <tbody>                 
        @foreach($professions as $profession)
        <tr>
            <td>{{$profession->name}}</td>
            <td>{{$profession->description}}</td>          
            <td><a href="{{ route('professions.edit',$profession->id)}}" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            <td> <form action="{{ route('professions.destroy', $profession->id) }}" method="POST"  data-toggle="tooltip" data-original-title="deletar" onsubmit="if(confirm('Deletar {{$profession->name}}?')) { return true } else {return false }">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i></button>
              </form>
          </td>                          
        </tr>
        @endforeach
        </tbody>
          <tfoot>
              <tr>
                <th>Nome</th>
                <th>Descrição</th> 
                <th><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
                <th><i class="fa fa-trash" aria-hidden="true"></i></th>   
              </tr>
            </tfoot>
        </table>
      </div>
    </div>
@stop