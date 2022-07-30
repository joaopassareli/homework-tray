<x-layout title="Vendas" :mensagem-sucesso="$mensagemSucesso">

    <a href="{{ route('sales.create') }}" class="btn btn-dark mb-2">Gerar Venda</a>



    <table class="table table-striped table-hover">
        <thead align="center">
            <th scope="col">Código da Venda</th>
            <th scope="col">Vendedor</th>
            <th scope="col">Valor da Venda</th>
            <th scope="col">Data da Venda</th>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr scope="row" align="center">
                    <th>{{ $sale->id }}</th>
                    <td>{{ $vendors->find($sale->vendor_id)->name }}</td>
                    <td>R$ {{ $sale->sale_value }}</td>
                    <td>{{ date('d/m/Y', strtotime($sale->created_at)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</x-layout>
