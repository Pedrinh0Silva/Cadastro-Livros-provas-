@extends('layouts.app')

@section('title', $livro->titulo)

@section('content')
<style>
    .page-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .page-header h1 { font-size: 1.5rem; font-weight: 700; color: #1e3a5f; }

    .card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        padding: 2rem;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .detail-item { display: flex; flex-direction: column; gap: 0.3rem; }
    .detail-item.full { grid-column: 1 / -1; }

    .detail-label {
        font-size: 0.75rem;
        font-weight: 700;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 0.06em;
    }

    .detail-value {
        font-size: 1rem;
        color: #1a202c;
    }

    .badge {
        display: inline-block;
        padding: 0.3rem 0.8rem;
        border-radius: 999px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .badge-disponivel { background: #d1fae5; color: #065f46; }
    .badge-emprestado { background: #fef3c7; color: #92400e; }

    .divider {
        border: none;
        border-top: 1px solid #f0f4f8;
        margin: 1.75rem 0;
    }

    .actions { display: flex; gap: 0.75rem; }

    .btn {
        display: inline-block;
        padding: 0.65rem 1.5rem;
        border-radius: 6px;
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        border: none;
        transition: opacity 0.15s;
    }

    .btn:hover    { opacity: 0.85; }
    .btn-primary  { background: #1e3a5f; color: #fff; }
    .btn-secondary{ background: #e2e8f0; color: #1a202c; }
    .btn-danger   { background: #ef4444; color: #fff; }
</style>

<div class="page-header">
    <a href="{{ route('livros.index') }}" style="color:#1e3a5f; text-decoration:none; font-size:1.2rem">←</a>
    <h1>{{ $livro->titulo }}</h1>
</div>

<div class="card">
    <div class="detail-grid">

        <div class="detail-item full">
            <span class="detail-label">Título</span>
            <span class="detail-value">{{ $livro->titulo }}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">Autor</span>
            <span class="detail-value">{{ $livro->autor }}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">Ano de Publicação</span>
            <span class="detail-value">{{ $livro->ano_publicacao }}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">Gênero</span>
            <span class="detail-value">{{ $livro->genero ?? '—' }}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">Quantidade de Páginas</span>
            <span class="detail-value">{{ $livro->quantidade_paginas ?? '—' }}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">Status</span>
            <span class="detail-value">
                <span class="badge badge-{{ $livro->status }}">
                    {{ ucfirst($livro->status) }}
                </span>
            </span>
        </div>

        <div class="detail-item">
            <span class="detail-label">Cadastrado em</span>
            <span class="detail-value">{{ $livro->created_at->format('d/m/Y') }}</span>
        </div>

    </div>

    <hr class="divider">

    <div class="actions">
        <a href="{{ route('livros.edit', $livro) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary">Voltar</a>
        <form action="{{ route('livros.destroy', $livro) }}" method="POST"
              onsubmit="return confirm('Excluir este livro?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
    </div>
</div>
@endsection
