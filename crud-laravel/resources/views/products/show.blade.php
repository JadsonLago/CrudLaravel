@extends('layouts.app')

@section('title', 'Detalhes do Produto')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Detalhes do Produto</h1>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>Nome:</strong> {{ $product->name }}
        </div>
        <div class="mb-3">
            <strong>Descrição:</strong> {{ $product->description }}
        </div>
        <div class="mb-3">
            <strong>Preço:</strong> R$ {{ number_format($product->price, 2, ',', '.') }}
        </div>
        <div class="mb-3">
            <strong>Criado em:</strong> {{ $product->created_at->format('d/m/Y H:i') }}
        </div>
        <div class="mb-3">
            <strong>Atualizado em:</strong> {{ $product->updated_at->format('d/m/Y H:i') }}
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</div>
@endsection