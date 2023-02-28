@extends("templates.template")

@section("content")

<div class="col-8 mt-4 m-auto text-center">
    <h2 class="text-center mt-4 mb-4 text-light fs-5 fw-bold">Lista da quantidade de leite produzido e de ração necessária por semana:</h2>
    <table class="table table-hover text-light" style="background-color: #13795B;">
        <thead>
            <tr class="text-center">
                <th scope="col">Leite</th>
                <th scope="col">Ração</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center table-light">
                @php
                $totalDeLeiteProd = 0;
                $totalDeRacao = 0;
                @endphp
                @foreach($todosbovinos as $bovino)
                @php
                $totalDeLeiteProd += $bovino->leiteProduzido;
                $totalDeRacao += $bovino->racaoConsumida;
                @endphp
                @endforeach
                <th scope="row">{{$totalDeLeiteProd * 7}} litros</th>
                <th scope="row">{{$totalDeRacao * 7}}kg</th>
            </tr>
        </tbody>
    </table>
</div>

<div>
    <h2 class="text-center mt-4 mb-4 text-light fs-5 fw-bold">Animais com até um ano e que consomem mais de 500kg de ração por semana:</h2>

    <div class="col-8 m-auto mt-4">

        <table class="table table-hover text-light" style="background-color: #13795B;">
            <thead>
                <tr class="text-center">
                    <th scope="col">Código</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Qtd. Leite prod.</th>
                    <th scope="col">Qtd. Ração consu.</th>
                    <th scope="col">Data de nascimento</th>
                    <th scope="col">Idade</th>
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

                @if($idade->y <= 1 && ($bovino->racaoConsumida * 7) >=500)
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
                    </tr>
            </tbody>
            @endif
            @endforeach
        </table>
    </div>
</div>
@endsection