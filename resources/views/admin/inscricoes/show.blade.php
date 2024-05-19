@extends('admin.template')
@section('title', 'Perdil do ginásio')

@section('content')
    <div class="pagetitle">
        <h1>Detalhes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('inscricoes.index') }}">Lista</a></li>
                <li class="breadcrumb-item active">{{ $inscricao->nome }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div id="carouselExampleDark" class="carousel carousel-dark slide">

                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="{{ asset("uploads/$inscricao->foto") }}" height="500px" width="500px"
                                class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Resumo</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-status">Estado</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Detalhes da inscricão</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nome</div>
                                    <div class="col-lg-9 col-md-8">{{ $inscricao->nome }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">BI</div>
                                    <div class="col-lg-9 col-md-8">{{ $inscricao->bi }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Peso</div>
                                    <div class="col-lg-9 col-md-8">{{ $inscricao->peso }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Telefone</div>
                                    <div class="col-lg-9 col-md-8">{{ $inscricao->telefone }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $inscricao->email }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Endereço</div>
                                    <div class="col-lg-9 col-md-8">{{ $inscricao->residencia }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Ver anexo</div>
                                    <div class="col-lg-9 col-md-8">
                                        <a target="_self" class="btn btn-info" @if ($inscricao->anexo)
                                            href="{{ asset("uploads/$inscricao->anexo") }}"
                                        @endif>Abir</a>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-hours pt-3" id="profile-status">

                                <!-- Profile Edit Form -->
                                <form method="post" action="{{ route('inscricoes.update', $inscricao) }}">
                                    @method('PUT')
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Aprovado</div>
                                        <div class="col-lg-9 col-md-8">
                                            <select class="form-select"@checked($inscricao->is_aprovado) name="is_aprovado"
                                                type="checkbox" id="is_aprovado">
                                                <option value="">Selecionar Opção</option>
                                                <option @selected($inscricao->is_aprovado) value="1">Sim</option>
                                                <option @selected(!$inscricao->is_aprovado) value="0">Não</option>
                                            </select>
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
