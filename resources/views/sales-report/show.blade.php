<x-layout title="Relatório de Vendas">

    <section class="d-flex justify-content-center mt-3">
        <h2>Vendedor(a): {{ $vendor->name }}</h2>
    </section>
    <section class="d-flex justify-content-center mt-1">
        <h3>E-mail: {{ $vendor->email }}</h3>
    </section>


    <table class="table table-striped table-hover mt-5">
        <thead align="center">
            <th scope="col">ID do Vendedor</th>
            <th scope="col">Valor da Venda</th>
            <th scope="col">Comissão</th>
            <th scope="col">Hora da Venda</th>
            <th scope="col">Data da Venda</th>
        </thead>
        <tbody>
            @foreach($sales as $sale)
            <tr scope="row" align="center">
                <td>{{ $vendor->id }}</td>
                <td class="sale-value">
                    R$ <?= number_format($sale->sale_value, 2, ',', '.'); ?>
                </td>
                <td class="comission-value">
                    R$ <?= number_format($sale->sale_value * 0.085, 2, ',', '.'); ?>
                </td>
                <td>
                    {{ date('H:i:s', strtotime($sale->created_at)) }}
                </td>
                <td>
                    {{ date('d/m/Y ', strtotime($sale->created_at)) }}
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot align="center">
            <tr>
                <th colspan="5" style="font-weight: bold" id="totalComission">
                    Total de Comissão R$ <?= number_format($totalComission, 2, ',', '.'); ?>
                </th>
            </tr>
            <tr>
                <th colspan="5" style="font-weight: bold">
                    Total das Vendas R$ <?= number_format($totalSalesValue, 2, ',', '.'); ?>
                </th>
            </tr>

        </tfoot>
    </table>

    <a href="{{ url()->previous() }}" class="btn btn-primary btn-lg ms-3">Voltar</a>

</x-layout>







