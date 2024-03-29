<x-layout title="Vendas Registradas em {{ date('d/m/Y') }}" :mensagem-sucesso="$mensagemSucesso">

    <section class="buttons d-flex flex-row-reverse mb-4">
        <a href="{{ route('sales.create') }}" class="btn btn-success ms-3">
            Gerar Venda  <i class="bi bi-plus-square"></i>
        </a>
        <a href="{{ route('send-report') }}" class="btn btn-dark">
            Relatório de Vendas  <i class="bi bi-envelope-exclamation-fill"></i>
        </a>
    </section>

    <table class="table table-striped table-hover">
        <thead align="center">
            <th scope="col">Código da Venda</th>
            <th scope="col">Vendedor</th>
            <th scope="col">Valor da Venda</th>
            <th scope="col">Hora da Venda</th>
            <th scope="col">Data da Venda</th>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr scope="row" align="center">
                    <th>{{ $sale->id }}</th>
                    <td>{{ $vendors->find($sale->vendor_id)->name }}</td>
                    <td>R$ <?= number_format($sale->sale_value, 2, ',', '.') ?> </td>
                    <td>{{ date('H:i:s', strtotime($sale->created_at)) }}</td>
                    <td>{{ date('d/m/Y ', strtotime($sale->created_at)) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot align="center">
            <th colspan="5" style="font-weight: bold" id="totalComission">
                Total de Vendas R$ <?= number_format($totalSalesValue, 2, ',', '.') ?>
            </th>
        </tfoot>
    </table>

    <div class="d-flex justify-content-center">
        <a href="{{ route('all') }}" class="btn btn-dark">
            Veja Todas as Vendas  <i class="bi bi-receipt-cutoff"></i>
        </a>
    </div>

</x-layout>
