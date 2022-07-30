<x-layout title="Vendedores" :mensagem-sucesso="$mensagemSucesso">

    <a href="{{ route('vendors.create') }}" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">

        @foreach($vendors as $vendor)
            <li class="list-group-item d-flex justify-content-between align-items-center">

                <div class="d-flex alignt-items-center">
                    {{ $vendor->name }}
                </div>

                <div class="botoes d-flex">
                    <a href="{{ route('vendors.edit', $vendor->id) }}" class="btn btn-info btn-sm">
                        <i class="bi bi-pencil-square"></i>
                    </a>

                    <form action="{{ route('vendors.destroy', $vendor->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm ms-1">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>

            </li>
        @endforeach
    </ul>

</x-layout>
