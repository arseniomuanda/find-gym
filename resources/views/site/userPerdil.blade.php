@extends('site.template')
@section('title', 'Perdil do Utilizador')

@section('content')
    <div class="pagetitle">
        <h1>Detalhes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">{{ $utilizador->name }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
        <div class="row">

            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Resumo</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-status">Alterar
                                    senha</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Detalhes da inscricão</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nome</div>
                                    <div class="col-lg-9 col-md-8">{{ $utilizador->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Telefone</div>
                                    <div class="col-lg-9 col-md-8">{{ $utilizador->telefone }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $utilizador->email }}</div>
                                </div>
                            </div>

                            <div class="tab-pane fade profile-hours pt-3" id="profile-status">

                                <!-- Profile Edit Form -->
                                <form method="post" action="{{ route('utilizadores.update', $utilizador) }}">
                                    @method('PUT')
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label"><label for="old_pass">Senha antiga</label>
                                        </div>
                                        <div class="col-lg-9 col-md-8 mb-3">
                                            <input required class="form-control @error('old_pass') is-invalid @enderror" name="old_pass" type="password" id="old_pass">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label"><label for="password">Nova senha</label></div>
                                        <div class="col-lg-9 col-md-8 mb-3">
                                            <input required class="form-control @error('password') is-invalid @enderror" name="password" type="password" id="password">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label"><label for="password_confirmation">Confirmar
                                                senha</label></div>
                                        <div class="col-lg-9 col-md-8 mb-3">
                                            <input required class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" type="password"
                                                id="password_confirmation">
                                        </div>
                                    </div>


                                    <div class="row mt-2">
                                        <div class="col-10">
                                        </div>
                                        <div class="col-2">
                                            <div class="text-center">
                                                <button type="submit" class="btn block btn-primary">Salvar</button>
                                            </div>
                                        </div>
                                    </div>

                                </form><!-- End Profile Edit Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
