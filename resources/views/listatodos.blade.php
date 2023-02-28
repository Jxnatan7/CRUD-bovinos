@extends("templates.template")

@section("content")
<h1 class="col-8 mt-4 m-auto text-light text-center">Lista de todos os bovinos</h1>
<div class="col-8 m-auto mt-4">
    @csrf
    <table class="table table-hover text-light" style="background-color: #13795B;">
        <thead>
            <tr class="text-center">
                <th scope="col">Código</th>
                <th scope="col">Peso</th>
                <th scope="col">Qtd. Leite prod.</th>
                <th scope="col">Qtd. Ração consu.</th>
                <th scope="col">Data de nascimento</th>
                <th scope="col">Idade</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @php
            $diaAtual = new DateTime(date("Y-m-d"));
            @endphp

            @foreach($todosbovinos as $bovino)

            @php
            $dataInicial = $bovino->data_nasc;
            $dataInicial = new DateTime($dataInicial);
            $idade = $dataInicial->diff($diaAtual);
            $meses = $idade->m
            @endphp
            <tr class="text-center table-light">
                <th scope="row">{{$bovino->id}}</th>
                <td>{{$bovino->peso}}kg</td>
                <td>{{$bovino->leiteProduzido}} Litros</td>
                <td>{{$bovino->racaoConsumida}}kg</td>
                <td>{{date("d-m-Y", strtotime($bovino->data_nasc))}}</td>
                <td>
                    {{$idade->y}} 
                    @if($idade->y >= 2) anos @else ano @endif
                    e {{$meses}}
                    @if($idade->m >= 2) meses @else mes @endif
                </td>
                <td>
                    <a href="{{url("gerenciando_bovinos/$bovino->id/edit")}}">
                        <button class="btn btn-dark">Editar</button>
                    </a>
                    <a href="{{url("gerenciando_bovinos/$bovino->id")}}" class="js-del">
                        <button class="btn btn-danger">Deletar</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection