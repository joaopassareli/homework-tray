<x-layout title="Cadastrar Vendedores">
    <form action="{{ route('vendors.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-7">
                <label for="name" class="form-label">Nome do Vendedor:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" autofocus>
            </div>

            <div class="col-6 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="exemplo@exemplo.com">
            </div>
        </div>

        <button class="btn btn-primary mt-3">
            Cadastrar
        </button>
    </form>
</x-layout>
