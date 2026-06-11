@extends('layouts.app')

@section('title', 'Livros')

@section('content')
<style>
    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
    }

    .page-header h1 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e3a5f;
    }

    .btn {
        display: inline-block;
        padding: 0.55rem 1.2rem;
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        border: none;
        transition: opacity 0.15s;
    }

    .btn:hover { opacity: 0.85; }
    .btn-primary   { background: #1e3a5f; color: #fff; }
    .btn-secondary { background: #e2e8f0; color: #1a202c; }
    .btn-danger    { background: #ef4444; color: #fff; }
    .btn-sm        { padding: 0.35rem 0.8rem; font-size: 0.8rem; }

    .card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    table { width: 100%; border-collapse: collapse; }

    thead { background: #1e3a5f; color: #fff; }
    thead th { padding: 0.85rem 1rem; text-align: left; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; }

    tbody tr { border-bottom: 1px solid #f0f4f8; transition: background 0.1s; }
    tbody tr:hover { background: #f8fafc; }
    tbody td { padding: 0.85rem 1rem; font-size: 0.9rem; }

    .badge {
        display: inline-block;
        padding: 0.25rem 0.65rem;
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-disponivel  { background: #d1fae5; color: #065f46; }
    .badge-emprestado  { background: #fef3c7; color: #92400e; }

    .actions { display: flex; gap: 0.4rem; }

    .empty {
        text-align: center;
        padding: 3rem 1rem;
        color: #94a3b8;
    }
</style>

<div class="page-header">
    <h1>Livros cadastrados</h1>
    <a href="{{ route('livros.create') }}" class="btn btn-primary">+ Novo livro</a>
</div>

<div class="card">
    @if($livros->isEmpty())
        <div class="empty">
            <p style="font-size:2rem">📭</p>
            <p>Nenhum livro cadastrado ainda.</p>
            <a href="{{ route('livros.create') }}" class="btn btn-primary" style="margin-top:1rem">Cadastrar primeiro livro</a>
        </div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Ano</th>
                    <th>Gênero</th>
                    <th>Páginas</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livros as $livro)
                <tr>
                    <td><strong>{{ $livro->titulo }}</strong></td>
                    <td>{{ $livro->autor }}</td>
                    <td>{{ $livro->ano_publicacao }}</td>
                    <td>{{ $livro->genero }}</td>
                    <td>{{ $livro->quantidade_paginas }}</td>
                    <td>
                        <span class="badge badge-{{ $livro->status }}">
                            {{ ucfirst($livro->status) }}
                        </span>
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('livros.show', $livro) }}" class="btn btn-secondary btn-sm">Ver</a>
                            <a href="{{ route('livros.edit', $livro) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('livros.destroy', $livro) }}" method="POST"
                                  onsubmit="return confirm('Excluir este livro?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
