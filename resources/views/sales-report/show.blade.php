<x-layout title="Relatório de Vendas">

    <section class="d-flex justify-content-center mt-3">
        <h2>Vendedora: {{ $vendor->name }} - {{ $vendor->email }}</h2>
    </section>


    <table class="table table-striped table-hover mt-5">
        <thead align="center">
            <th scope="col">ID do Vendedor</th>
            <th scope="col">Valor da Venda</th>
            <th scope="col">Comissão</th>
            <th scope="col">Data da Venda</th>
        </thead>
        <tbody>
            @foreach($sales as $sale)
            <tr scope="row" align="center">
                <td>{{ $vendor->id }}</td>
                <td class="sale-value">{{ $sale->sale_value }}</td>
                <td class="comission-value">{{ $sale->sale_value * 0.085 }}</td>
                <td>{{ date('d/m/Y', strtotime($sale->created_at)) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot align="center">
            <th colspan="2" style="font-weight: bold">Total de Comissão</th>
            <th colspan="2" style="font-weight: bold" id="totalComission">{{ $totalComission }}</th>
        </tfoot>
    </table>

    <script src="{{ asset('js/jquery.js') }}"></script>
    {{-- <script src="{{ asset('js/main.js') }}"></script> --}}

    <script>

        // let saleValue = {{ $sale->sale_value }};
        // let formatedSaleValue = saleValue.toLocaleString('pt-BR',{style: 'currency', currency: 'BRL'});
        // saleValueText = $('.sale-value');
        // saleValueText.text(formatedSaleValue);

        // comissionValue = {{ $sale->sale_value * 0.085 }};
        // formatedComissionValue = comissionValue.toLocaleString('pt-BR',{style: 'currency', currency: 'BRL'});
        // comissionValueText = $('.comission-value');
        // comissionValueText.text(formatedComissionValue);

        totalComission = {{ $totalComission }};
        formatedtotalComission = totalComission.toLocaleString('pt-BR',{style: 'currency', currency: 'BRL'});
        totalComissionText = $('#totalComission');
        totalComissionText.text(formatedtotalComission);
    </script>

</x-layout>







