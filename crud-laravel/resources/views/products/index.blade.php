@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="row mb-3">
    <div class="col">
        <h1>Lista de Produtos</h1>
    </div>
    <div class="col text-end">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Novo Produto</a>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ Str::limit($product->description, 50) }}</td>
            <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
            <td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $products->links('pagination::bootstrap-5') }}
@endsection