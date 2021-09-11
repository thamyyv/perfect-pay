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
<form method='POST' action="{{route('products.update',$productResource->id)}}" method="POST">
  @method('PUT')
  @csrf
  <div class="form-group">
    <label for="name">Nome do Produto</label>
    <input type="text" class="form-control" value="{{old('name',$productResource->name)}}" id="name" name="name" placeholder="Adicione o nome do Produto." required="required">
    <small id="nameHelp" class="form-text text-muted">Nome do Produto a ser cadastrado.</small>
  </div>
  <div class="form-group">
    <label for="sinopse">Descrição do Produto</label>
    <textarea type="text" class="form-control" id="description" name="description" placeholder="Adcione a descrição do Produto." required="required">{{old('desciption',$productResource->description)}}</textarea>
  </div>
  <label for="sinopse">Cor do Produto</label>
  <select class="form-control" id='collor_id' name="collor_id">
    @foreach($collorsResource as $collor)
      <option value="{{$collor->id}}" @if($productResource->collor_id == $collor->id) selected="selected" @endif>{{$collor->name}}</option>
    @endforeach
  </select>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@push('scripts')
<script>
</script>
@endpush
