<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório de Vendas</title>
</head>
<body>
    <h1 class="d-flex justify-content-center">Relatório de Vendas - {{ date('d/m/Y')  }}</h1>

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
</body>
</html>
