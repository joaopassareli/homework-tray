<x-layout title="Cadastrar Venda">

    <form action="{{ route('sales.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-5">
                <label for="vendor_id" class="form-label">Nome do Vendedor:</label>
                <select class="form-select" name="vendor_id" id="vendor_id">
                    <option selected>Selecione um vendedor</option>
                    @foreach ($vendors as $vendor)
                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                    @endforeach
                  </select>
            </div>

            <div class="row">
                <div class="col-2 mt-3">
                    <label for="sale_value" class="form-label">Valor da Venda (R$):</label>
                    <input type="number" step="0.01" min="0" class="form-control" name="sale_value" id="sale_value" placeholder="R$ 1.234,56">
                </div>
            </div>

        </div>

        <button class="btn btn-primary mt-3">
            Cadastrar Venda
        </button>
    </form>
</x-layout>
