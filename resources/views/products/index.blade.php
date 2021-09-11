@extends('products.template')

@section('title','Produtos')

@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
@if (\Session::has('warning'))
    <div class="alert alert-warning">
        <ul>
            <li>{!! \Session::get('warning') !!}</li>
        </ul>
    </div>
@endif
@if (\Session::has('error'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('error') !!}</li>
        </ul>
    </div>
@endif
<button type="button" class="btn btn-success btn-icon btn-sm" title='Adicionar' onclick='location.href="{{ route('products.create')}}"'>
  Adicionar
  <i class="fa fa-pen"></i>
</button>
<br>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Cor</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products->items() as $product)
        <tr>
          <th scope="row">{{$product->id}}</th>
          <td>{{$product->name}}</td>
          <td>{{$product->collor->name}}</td>
          <td>
            <button type="button" class="btn btn-info btn-icon btn-sm" title='Editar' onclick='location.href="{{ route('products.edit', $product)}}"'>
              Editar
              <i class="fa fa-pen"></i>
            </button>
            <br>
            <form action="{{route('products.destroy',[$product->id])}}" method="POST">
              @method('DELETE')
              @csrf
              <button  type="submit" class="btn btn-danger btn-icon btn-sm" title='Deletar'>
                Deletar
                <i class="fa fa-pen"></i>
              </button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{$products->links()}}
@endsection