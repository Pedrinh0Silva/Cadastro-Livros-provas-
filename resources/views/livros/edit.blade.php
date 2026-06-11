@extends('layouts.app')

@section('title', 'Editar Livro')

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

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem;
    }

    .form-group { display: flex; flex-direction: column; gap: 0.4rem; }
    .form-group.full { grid-column: 1 / -1; }

    label { font-size: 0.8rem; font-weight: 600; color: #475569; text-transform: uppercase; letter-spacing: 0.04em; }

    input, select {
        padding: 0.65rem 0.9rem;
        border: 1.5px solid #e2e8f0;
        border-radius: 6px;
        font-size: 0.9rem;
        color: #1a202c;
        background: #f8fafc;
        transition: border-color 0.15s;
    }

    input:focus, select:focus {
        outline: none;
        border-color: #1e3a5f;
        background: #fff;
    }

    .input-error { border-color: #ef4444 !important; }
    .error-msg   { font-size: 0.78rem; color: #ef4444; }

    .form-actions {
        display: flex;
        gap: 0.75rem;
        margin-top: 1.75rem;
        padding-top: 1.25rem;
        border-top: 1px solid #f0f4f8;
    }

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
</style>

<div class="page-header">
    <a href="{{ route('livros.index') }}" style="color:#1e3a5f; text-decoration:none; font-size:1.2rem">←</a>
    <h1>Editar: {{ $livro->titulo }}</h1>
</div>

<div class="card">
    <form action="{{ route('livros.update', $livro) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-grid">

            <div class="form-group full">
                <label for="titulo">Título *</label>
                <input type="text" id="titulo" name="titulo"
                       value="{{ old('titulo', $livro->titulo) }}"
                       class="{{ $errors->has('titulo') ? 'input-error' : '' }}">
                @error('titulo') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="autor">Autor *</label>
                <input type="text" id="autor" name="autor"
                       value="{{ old('autor', $livro->autor) }}"
                       class="{{ $errors->has('autor') ? 'input-error' : '' }}">
                @error('autor') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="ano_publicacao">Ano de Publicação *</label>
                <input type="number" id="ano_publicacao" name="ano_publicacao"
                       value="{{ old('ano_publicacao', $livro->ano_publicacao) }}" min="1000" max="9999"
                       class="{{ $errors->has('ano_publicacao') ? 'input-error' : '' }}">
                @error('ano_publicacao') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="genero">Gênero</label>
                <input type="text" id="genero" name="genero"
                       value="{{ old('genero', $livro->genero) }}"
                       class="{{ $errors->has('genero') ? 'input-error' : '' }}">
                @error('genero') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="quantidade_paginas">Quantidade de Páginas</label>
                <input type="number" id="quantidade_paginas" name="quantidade_paginas"
                       value="{{ old('quantidade_paginas', $livro->quantidade_paginas) }}" min="1"
                       class="{{ $errors->has('quantidade_paginas') ? 'input-error' : '' }}">
                @error('quantidade_paginas') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="status">Status *</label>
                <select id="status" name="status"
                        class="{{ $errors->has('status') ? 'input-error' : '' }}">
                    <option value="disponivel" {{ old('status', $livro->status) == 'disponivel' ? 'selected' : '' }}>Disponível</option>
                    <option value="emprestado" {{ old('status', $livro->status) == 'emprestado' ? 'selected' : '' }}>Emprestado</option>
                </select>
                @error('status') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Salvar alterações</button>
            <a href="{{ route('livros.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
