@extends('layout.app')
@section('content')
<h1 class="h2">Contatos</h1>
<a href="{{route('admin.contact.create')}}" class="btn btn-success">Add Contato</a>
@if (session('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<form action="" method="get" class="m-3">
    <div class="row">
        <div class="col-md-10">
            <input type="text" class="form-control" placeholder="Busque por nome ou CPF">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary">Filtrar</button>
        </div>
    </div>
</form>
<div style="clear: both"></div>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
        <th scope="col">Telefone</th>
        <th scope="col">Ação</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($User->contacts as $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->nome}}</td>
        <td>{{$item->cpf}}</td>
        <td>{{$item->telefone}}</td>
        <td>
          <a href="{{route('admin.contact.show',[$item->id])}}" class="btn btn-warning">Ver</a>
          <a href="{{route('admin.contact.edit',[$item->id])}}" class="btn btn-primary">Editar</a>
          <form action="{{route('admin.contact.delete',[$item->id])}}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger">Deletar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection