@extends('admin.template')
@section('title', 'Adicionar Ginásio')

@section('content')
    <div class="pagetitle">
        <h1>Novo Ginásio</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Cadastrar ginágio</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <!-- General Form Elements -->
                        <h5 class="card-title">Dados do ginágio</h5>
                        <form method="POST" action="{{ route('ginasios.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nome</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nome" value="{{ old('nome') }}"
                                        class="form-control @error('nome') is-invalid @enderror">
                                    <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="empresa" class="col-sm-2 col-form-label">Empresa</label>
                                <div class="col-sm-10">
                                    <input type="text" name="empresa" value="{{ old('empresa') }}"
                                        class="form-control @error('empresa') is-invalid @enderror">
                                    <div class="invalid-feedback">{{ $errors->first('empresa') }}</div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
                                <div class="col-sm-10">
                                    <input type="text" name="telefone" value="{{ old('telefone') }}"
                                        class="form-control @error('telefone') is-invalid @enderror" required>
                                    <div class="invalid-feedback">{{ $errors->first('telefone') }}</div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" required>
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Endereço</label>
                                <div class="col-sm-10">
                                    <input name="endereco" class="form-control @error('endereco') is-invalid @enderror"
                                        type="text" id="formFile" required>
                                    <div class="invalid-feedback">{{ $errors->first('endereco') }}</div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Categoria</label>
                                <div class="col-sm-10">
                                    <select class="form-select @error('categoria') is-invalid @enderror" name="categoria"
                                        aria-label="selec" required>
                                        <option selected>Selecionar categoria</option>
                                        @foreach ($categorias as $item)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">{{ $errors->first('categoria') }}</div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Latitude</label>
                                <div class="col-sm-10">
                                    <input type="text" name="latitude" class="form-control @error('categoria') is-invalid @enderror" required>
                                    <div class="invalid-feedback">{{ $errors->first('categoria') }}</div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
                                <div class="col-sm-10">
                                    <input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror" required>
                                    <div class="invalid-feedback">{{ $errors->first('longitude') }}</div>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="imagem" class="col-sm-2 col-form-label">Imagem</label>
                                <div class="col-sm-10">
                                    <input type="file" name="imagem" class="form-control @error('imagem') is-invalid @enderror" required>
                                    <div class="invalid-feedback">{{ $errors->first('imagem') }}</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
