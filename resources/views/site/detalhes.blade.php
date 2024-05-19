@extends('site.template')
@section('title', 'Perfil de ginasios')

@section('content')
    <div class="pagetitle">
        <h1>Detalhes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ $ginasio->nome }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div id="carouselExampleDark" class="carousel carousel-dark slide">

                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="{{ asset("uploads/$ginasio->imagem") }}" height="500px" width="500px"
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
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-hours">Horário de
                                    funcionamento</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#subscribe">Inscrecer-se</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Sobre</h5>
                                <p class="small fst-italic">{{ $ginasio->sobre }}</p>

                                <h5 class="card-title">Detalhes do gisnásio</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nome</div>
                                    <div class="col-lg-9 col-md-8">{{ $ginasio->nome }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Empresa</div>
                                    <div class="col-lg-9 col-md-8">{{ $ginasio->empresa }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Telefone</div>
                                    <div class="col-lg-9 col-md-8">{{ $ginasio->telefone }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $ginasio->email }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Endereço</div>
                                    <div class="col-lg-9 col-md-8">{{ $ginasio->endereco }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Categoria</div>
                                    <div class="col-lg-9 col-md-8">{{ $ginasio->getCategoria->nome }}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-hours pt-3" id="profile-hours">

                                <!-- Profile Edit Form -->
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="domingo1">Domingo</label>
                                            <input @readonly(true) class="form-check-input" type="checkbox"
                                                @checked(@explode(';', $ginasio->domingo)[0] == 'on') name="domingo1" id="domingo1">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-1">
                                                    <span id="basic-addon1" class="input-group-text w-25">Inicio</span>
                                                    <input @readonly(true) type="time" name="domingo2"
                                                        aria-label="name" value="{{ @explode(';', $ginasio->domingo)[1] }}"
                                                        aria-describedby="basic-addon1" class="form-control fw-bold">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-1">
                                                    <span id="basic-addon1" class="input-group-text w-25">Fim</span>
                                                    <input @readonly(true) type="time" name="domingo3"
                                                        aria-label="name" value="{{ @explode(';', $ginasio->domingo)[2] }}"
                                                        aria-describedby="basic-addon1" class="form-control fw-bold">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="segunda1">Segunda</label>
                                            <input @readonly(true) class="form-check-input" @checked(@explode(';', $ginasio->segunda)[0] == 'on')
                                                name="segunda1" type="checkbox" id="segunda1">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-1">
                                                    <span id="basic-addon1" class="input-group-text w-25">Inicio</span>
                                                    <input @readonly(true) type="time" name="segunda2"
                                                        aria-label="name"
                                                        value="{{ @explode(';', $ginasio->segunda)[1] }}"
                                                        aria-describedby="basic-addon1" class="form-control fw-bold">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-1">
                                                    <span id="basic-addon1" class="input-group-text w-25">Fim</span>
                                                    <input @readonly(true) type="time" name="segunda3"
                                                        aria-label="name"
                                                        value="{{ @explode(';', $ginasio->segunda)[2] }}"
                                                        aria-describedby="basic-addon1" class="form-control fw-bold">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="terca1">Terça</label>
                                            <input @readonly(true) class="form-check-input" @checked(@explode(';', $ginasio->terca)[0] == 'on')
                                                name="terca1" type="checkbox" id="terca1">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-1">
                                                    <span id="basic-addon1" class="input-group-text w-25">Inicio</span>
                                                    <input @readonly(true) type="time" name="terca2"
                                                        aria-label="name" value="{{ @explode(';', $ginasio->terca)[1] }}"
                                                        aria-describedby="basic-addon1" class="form-control fw-bold">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-1">
                                                    <span id="basic-addon1" class="input-group-text w-25">Fim</span>
                                                    <input @readonly(true) type="time" name="terca3"
                                                        aria-label="name" value="{{ @explode(';', $ginasio->terca)[2] }}"
                                                        aria-describedby="basic-addon1" class="form-control fw-bold">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="quarta1">Quarta</label>
                                            <input @readonly(true) class="form-check-input" name="quarta1"
                                                @checked(@explode(';', $ginasio->quarta)[0] == 'on') type="checkbox" id="quarta1">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-1">
                                                    <span id="basic-addon1" class="input-group-text w-25">Inicio</span>
                                                    <input @readonly(true) type="time" name="quarta2"
                                                        aria-label="name"
                                                        value="{{ @explode(';', $ginasio->quarta)[1] }}"
                                                        aria-describedby="basic-addon1" class="form-control fw-bold">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-1">
                                                    <span id="basic-addon1" class="input-group-text w-25">Fim</span>
                                                    <input @readonly(true) type="time" name="quarta3"
                                                        aria-label="name"
                                                        value="{{ @explode(';', $ginasio->quarta)[2] }}"
                                                        aria-describedby="basic-addon1" class="form-control fw-bold">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="quinta1">Quinta</label>
                                            <input @readonly(true) class="form-check-input"@checked(@explode(';', $ginasio->quinta)[0] == 'on')
                                                name="quinta1" type="checkbox" id="quinta1">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-1">
                                                    <span id="basic-addon1" class="input-group-text w-25">Inicio</span>
                                                    <input @readonly(true) type="time" name="quinta2"
                                                        aria-label="name"
                                                        value="{{ @explode(';', $ginasio->quinta)[1] }}"
                                                        aria-describedby="basic-addon1" class="form-control fw-bold">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-1">
                                                    <span id="basic-addon1" class="input-group-text w-25">Fim</span>
                                                    <input @readonly(true) type="time" name="quinta3"
                                                        aria-label="name"
                                                        value="{{ @explode(';', $ginasio->quinta)[2] }}"
                                                        aria-describedby="basic-addon1" class="form-control fw-bold">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="sexta1">Sexta</label>
                                            <input @readonly(true) class="form-check-input"@checked(@explode(';', $ginasio->sexta)[0] == 'on')
                                                name="sexta1" type="checkbox" id="sexta1">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-1">
                                                    <span id="basic-addon1" class="input-group-text w-25">Inicio</span>
                                                    <input @readonly(true) type="time" name="sexta2"
                                                        aria-label="name" value="{{ @explode(';', $ginasio->sexta)[1] }}"
                                                        aria-describedby="basic-addon1" class="form-control fw-bold">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-1">
                                                    <span id="basic-addon1" class="input-group-text w-25">Fim</span>
                                                    <input @readonly(true) type="time" name="sexta3"
                                                        aria-label="name" value="{{ @explode(';', $ginasio->sexta)[2] }}"
                                                        aria-describedby="basic-addon1" class="form-control fw-bold">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="sabado1">Sábado</label>
                                            <input @readonly(true) class="form-check-input"@checked(@explode(';', $ginasio->sabado)[0] == 'on')
                                                name="sabado1" type="checkbox" id="sabado1">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-1">
                                                    <span id="basic-addon1" class="input-group-text w-25">Inicio</span>
                                                    <input @readonly(true) type="time" name="sabado2"
                                                        aria-label="name"
                                                        value="{{ @explode(';', $ginasio->sabado)[1] }}"
                                                        aria-describedby="basic-addon1" class="form-control fw-bold">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-1">
                                                    <span id="basic-addon1" class="input-group-text w-25">Fim</span>
                                                    <input @readonly(true) type="time" name="sabado3"
                                                        aria-label="name"
                                                        value="{{ @explode(';', $ginasio->sabado)[2] }}"
                                                        aria-describedby="basic-addon1" class="form-control fw-bold">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="tab-pane fade subscribe pt-3" id="subscribe">
                                <!-- Profile Edit Form -->
                                <form method="POST" action="{{ route('inscricoes.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="ginasio" value="{{ $ginasio->id }}">
                                    <div class="row mb-3">
                                        <label for="bi" class="col-md-4 col-lg-3 col-form-label">BI</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="bi" onfocusout="appVue.getBI(this.value)"
                                                required name="bi" type="text" class="form-control"
                                                id="bi">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Nome</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nome" type="text" required readonly
                                                class="form-control" id="nome">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="telefone" class="col-md-4 col-lg-3 col-form-label">Telefone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="telefone" type="text" required
                                                class="form-control" id="telefone" value="">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="text" class="form-control"
                                                id="email" value="">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="provincia" class="col-md-4 col-lg-3 col-form-label">Província</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="provincia" required type="text"
                                                class="form-control" id="provincia" value="">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nacionalidade"
                                            class="col-md-4 col-lg-3 col-form-label">Nacionalidade</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nacionalidade" required type="text"
                                                class="form-control" id="nacionalidade" value="" readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="residencia"
                                            class="col-md-4 col-lg-3 col-form-label">Residencia</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="residencia" required type="text"
                                                class="form-control" id="residencia" value="">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="sexo" class="col-md-4 col-lg-3 col-form-label">Sexo</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="sexo" required type="text"
                                                class="form-control" id="sexo" value="" readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="sexo" class="col-md-4 col-lg-3 col-form-label">Peso</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="peso" required type="number" step="0.1"
                                                class="form-control" id="peso" value="">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="data_nascimento" class="col-md-4 col-lg-3 col-form-label">Data de
                                            nascimento</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="data_nascimento" required type="text"
                                                class="form-control" id="data_nascimento" value="" readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="estado_civil" class="col-md-4 col-lg-3 col-form-label">Estado
                                            Civil</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="estado_civil" required type="text"
                                                class="form-control" id="estado_civil" value="" readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="foto" class="col-md-4 col-lg-3 col-form-label">Foto</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="foto" type="file" class="form-control"
                                                id="foto" value="">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="anexo" class="col-md-4 col-lg-3 col-form-label">Anexo</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="anexo" type="file" class="form-control"
                                                id="anexo" value="">
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Enviar inscrição</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
