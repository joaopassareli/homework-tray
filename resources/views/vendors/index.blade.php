<x-layout title="Vendedores" :mensagem-sucesso="$mensagemSucesso">

    <a href="{{ route('vendors.create') }}" class="btn btn-dark mb-2">
        Adicionar <i class="bi bi-plus-square"></i>
    </a>

    <ul class="list-group">

        @foreach($vendors as $vendor)
            <li class="list-group-item d-flex justify-content-between align-items-center">

                <div class="d-flex alignt-items-center">
                    {{ $vendor->name }}
                </div>

                <div class="botoes d-flex">

                    <a href="{{ route('sales-report.show', $vendor->id) }}" class="btn btn-success btn-sm" title="Relatório de Vendas">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                    </a>

                    <a href="{{ route('vendors.edit', $vendor->id) }}" class="btn btn-info btn-sm ms-1" title="Editar Vendedor">
                        <i class="bi bi-pencil-square"></i>
                    </a>

                    <form action="{{ route('vendors.destroy', $vendor->id) }}" method="post" title="Excluir Vendedor">
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
