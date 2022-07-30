<x-layout title="Relatório de Vendas">

    <table class="table table-striped table-hover">
        <thead align="center">
            <th>Valor da Venda</th>
            <th scope="col">Comissão</th>
            <th scope="col">Data da Venda</th>
        </thead>
        <tbody>
            @foreach($sales as $sale)
            <tr scope="row" align="center">
                <td>R$ {{ $sale->sale_value }}</td>
                <td>R$ {{ $sale->sale_value * 0.085 }}</td>
                <td>{{ date('d/m/Y', strtotime($sale->created_at)) }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot align="center">
            <th colspan="3" style="font-weight: bold">Total de Comissão R$ {{ $totalComission }}</th>
        </tfoot>
    </table>

</x-layout>
{{-- id, nome, email, --}}
