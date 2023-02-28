@extends("templates.template")

@section("content")
<h1 class="col-8 mt-4 m-auto text-light text-center">@if(isset($bovino)) Editar Bovino @else Cadastrar Bovino @endif</h1>
<div class="col-8 m-auto mt-4">
        @if(isset($errors) && count($errors)>0)
        <div class="text-center mt- mb-4 p-2 alert alert-danger">
            @foreach($errors->all() as $erro)
                {{$erro}}<br>
            @endforeach 
        </div>
        @endif
    
    @if(isset($bovino))
    <form class="col-sm-6 container-fluid container justify-content-center" 
          name="formEdit" 
          id="formEdit" 
          method="post"
          action="{{url("gerenciando_bovinos/$bovino->id")}}" 
          >
          @method("PUT")
    @else
    <form class="col-sm-6 container-fluid container justify-content-center" 
          name="formCad" 
          id="formCad" 
          method="post"
          action="{{url("gerenciando_bovinos")}}" 
          >
    @endif
    
        @csrf 
        <p class="text-light">Código do bovino</p>
        <input class="form-control mb-4" value="{{$bovino->id ?? ''}}" type="number" name="id" id="id" placeholder="ex.: 57" required>
        <p class="text-light">Peso do bovino</p>
        <input class="form-control mb-4" value="{{$bovino->peso ?? ''}}" type="number" name="peso" id="peso" placeholder="ex.: 123" required>
        <p class="text-light">Leite produzido/dia (litros) </p>
        <input class="form-control mb-4" value="{{$bovino->leiteProduzido ?? ''}}" type="number" name="leiteProduzido" id="leiteProduzido" placeholder="ex.: 45" required>
        <p class="text-light">Ração consumida/dia (kg)</p>
        <input class="form-control mb-4" value="{{$bovino->racaoConsumida ?? ''}}" type="number" name="racaoConsumida" id="racaoConsumida" placeholder="ex.: 30" required>
        <p class="text-light">Data de nascimento do bovino</p>
        <input class="form-control mb-4" value="{{$bovino->data_nasc ?? ''}}" type="date" name="data_nasc" id="data_nasc" required>
        <input class="btn btn-success" type="submit" value="@if(isset($bovino)) Editar Bovino @else Cadastrar Bovino @endif">
    </form>
</div>
@endsection