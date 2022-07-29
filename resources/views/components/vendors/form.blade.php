<form action="{{ $action }}" method="post">
    @csrf

    @if($update)
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="name" class="form-label">Nome do Vendedor:</label>
        <input type="text" name="name" id="name" class="form-control" @isset($name)value="{{ $name }}"@endisset>
    </div>

    <div class="mt-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" id="email" @isset($email)value="{{ $email }}"@endisset>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Alterar</button>
</form>
