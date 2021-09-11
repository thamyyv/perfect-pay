@extends('products.template')

@section('title','Produtos')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('products.store')}}" method="POST">
  @method('POST')
  @csrf
  <div class="form-group">
    <label for="name">Nome do Produto</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Adicione o nome do Produto." required="required">
    <small id="nameHelp" class="form-text text-muted">Nome do Produto a ser cadastrado.</small>
  </div>
  <div class="form-group">
    <label for="description">Descrição do Produto</label>
    <textarea type="text" class="form-control" id="description" name="description" placeholder="Adicione a descrição do Produto." required="required"></textarea>
  </div>
  <label for="collor">Cor do Produto</label>
  <select class="form-control" id='collor_id' name="collor_id">
    @foreach($collors as $collor)
      <option value="{{$collor->id}}">{{$collor->name}}</option>
    @endforeach
  </select>
  <br>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection
@push('scripts')
<script>
</script>
@endpush
