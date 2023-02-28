@extends("templates.template")

@section("content")
<p class="text-center text-light mt-4 mb-4">Condições para abate: </p>
<ul class="text-light container justify-content-center mt-4 mb-4">
    <li>5 anos de idade ou mais</li>
    <li>Produz menos de 70 litros de leite por semana e come mais de 50kg de ração por dia</li>
    <li>Produz menos de 40 litros de leite por semana</li>
    <li>Pesa mais que 18 arrobas</li>
</ul>
<h1 class="col-8 mt-4 m-auto text-light text-center">Lista de todos os bovinos disponíveis para abate:</h1>
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
                <th scope="col">Abater</th>
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

            @if($idade->y >= 5 || $bovino->racaoConsumida >= 50 && $bovino->leiteProduzido * 7 <= 70 || $bovino->leiteProduzido * 7 <= 40 || ($bovino->peso / 15) >= 18)
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
                            <form action="{{url("gerenciando_bovinos")}}" method="post">
                                @csrf
                                <select class="btn btn-danger" name="abatido" id="abatido">
                                    <option value="0">NÃO</option>
                                    <option value="1">SIM</option>
                                </select>
                        </td>
                    </tr>
                    @endif
                    @endforeach
        </tbody>
    </table>
    <button class="btn btn-success" type="submit">Confirmar abates</button>
    </form>
</div>
@endsection