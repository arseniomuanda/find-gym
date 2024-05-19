@extends('admin.template')
@section('title', 'Perdil do ginásio')

@section('content')
    <div class="pagetitle">
        <h1>Detalhes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.ginasios') }}">Lista</a></li>
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
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-hours">Horário de
                                    funcionamento</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-inscritos">Inscritos</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Sobre</h5>
                                <p class="small fst-italic">{{ $ginasio->sobre }}</p>

                                <h5 class="card-title">Detalhes do Ginásio</h5>

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

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form method="POST" enctype="multipart/form-data"
                                    action="{{ route('ginasios.update', $ginasio) }}">
                                    @csrf
                                    @method('PUT')
                                    {{-- <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Imagns</label>
                                        @for ($i = 0; $i < 3; $i++)
                                            <div class="col-md-2 col-lg-2">
                                                <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile">
                                            </div>
                                        @endfor
                                        <div class="col-md-2 col-lg-2">
                                            <img src="{{ asset('assets/img/newimage.jpg') }}" alt="Profile">
                                        </div>

                                    </div> --}}

                                    <div class="row mb-3">
                                        <label for="nome" class="col-md-4 col-lg-3 col-form-label">Nome</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nome" type="text" class="form-control" id="nome"
                                                value="{{ $ginasio->nome }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="sobre" class="col-md-4 col-lg-3 col-form-label">Sobre</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="sobre" type="text" class="form-control" id="sobre">{{ $ginasio->sobre }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="empresa" class="col-md-4 col-lg-3 col-form-label">Empresa</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="empresa" type="text" class="form-control" id="empresa"
                                                value="{{ $ginasio->empresa }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="telefone" class="col-md-4 col-lg-3 col-form-label">Telefone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="telefone" type="text" maxlength="9" class="form-control" id="telefone"
                                                value="{{ $ginasio->telefone }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="text" class="form-control" id="email"
                                                value="{{ $ginasio->email }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="endereco" class="col-md-4 col-lg-3 col-form-label">Endereço</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="endereco" type="text" class="form-control" id="endereco"
                                                value="{{ $ginasio->endereco }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="categoria" class="col-md-4 col-lg-3 col-form-label">Categoria</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="categoria" type="text" class="form-control" id="categoria"
                                                required>
                                                <option value="">Selecionar Categoria</option>
                                                @foreach ($categorias as $item)
                                                    <option @selected($item->id == $ginasio->categoria) value="{{ $item->id }}">
                                                        {{ $item->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="latitude" class="col-md-4 col-lg-3 col-form-label">Latitude</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="latitude" type="text" class="form-control" id="latitude"
                                                value="{{ $ginasio->latitude }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="longitude" class="col-md-4 col-lg-3 col-form-label">Longitude</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="longitude" type="text" class="form-control" id="longitude"
                                                value="{{ $ginasio->longitude }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="imagem" class="col-md-4 col-lg-3 col-form-label">Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="imagem" type="file" class="form-control" id="imagem">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Salvar alteração</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade profile-hours pt-3" id="profile-hours">

                                <!-- Profile Edit Form -->
                                <form method="post" action="{{ route('admin.ginasios.hours', $ginasio) }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check form-switch">
                                                <label class="form-check-label" for="domingo1">Domingo</label>
                                                <input class="form-check-input" type="checkbox"
                                                    @checked(@explode(';', $ginasio->domingo)[0] == 'on') name="domingo1" id="domingo1">
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1">
                                                        <span id="basic-addon1"
                                                            class="input-group-text w-25">Inicio</span>
                                                        <input type="time" name="domingo2" aria-label="name"
                                                            value="{{ @explode(';', $ginasio->domingo)[1] }}"
                                                            aria-describedby="basic-addon1" class="form-control fw-bold">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1">
                                                        <span id="basic-addon1" class="input-group-text w-25">Fim</span>
                                                        <input type="time" name="domingo3" aria-label="name"
                                                            value="{{ @explode(';', $ginasio->domingo)[2] }}"
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
                                                <input class="form-check-input" @checked(@explode(';', $ginasio->segunda)[0] == 'on')
                                                    name="segunda1" type="checkbox" id="segunda1">
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1">
                                                        <span id="basic-addon1"
                                                            class="input-group-text w-25">Inicio</span>
                                                        <input type="time" name="segunda2" aria-label="name"
                                                            value="{{ @explode(';', $ginasio->segunda)[1] }}"
                                                            aria-describedby="basic-addon1" class="form-control fw-bold">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1">
                                                        <span id="basic-addon1" class="input-group-text w-25">Fim</span>
                                                        <input type="time" name="segunda3" aria-label="name"
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
                                                <input class="form-check-input" @checked(@explode(';', $ginasio->terca)[0] == 'on')
                                                    name="terca1" type="checkbox" id="terca1">
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1">
                                                        <span id="basic-addon1"
                                                            class="input-group-text w-25">Inicio</span>
                                                        <input type="time" name="terca2" aria-label="name"
                                                            value="{{ @explode(';', $ginasio->terca)[1] }}"
                                                            aria-describedby="basic-addon1" class="form-control fw-bold">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1">
                                                        <span id="basic-addon1" class="input-group-text w-25">Fim</span>
                                                        <input type="time" name="terca3" aria-label="name"
                                                            value="{{ @explode(';', $ginasio->terca)[2] }}"
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
                                                <input class="form-check-input" name="quarta1"
                                                    @checked(@explode(';', $ginasio->quarta)[0] == 'on') type="checkbox" id="quarta1">
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1">
                                                        <span id="basic-addon1"
                                                            class="input-group-text w-25">Inicio</span>
                                                        <input type="time" name="quarta2" aria-label="name"
                                                            value="{{ @explode(';', $ginasio->quarta)[1] }}"
                                                            aria-describedby="basic-addon1" class="form-control fw-bold">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1">
                                                        <span id="basic-addon1" class="input-group-text w-25">Fim</span>
                                                        <input type="time" name="quarta3" aria-label="name"
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
                                                <input class="form-check-input"@checked(@explode(';', $ginasio->quinta)[0] == 'on') name="quinta1"
                                                    type="checkbox" id="quinta1">
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1">
                                                        <span id="basic-addon1"
                                                            class="input-group-text w-25">Inicio</span>
                                                        <input type="time" name="quinta2" aria-label="name"
                                                            value="{{ @explode(';', $ginasio->quinta)[1] }}"
                                                            aria-describedby="basic-addon1" class="form-control fw-bold">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1">
                                                        <span id="basic-addon1" class="input-group-text w-25">Fim</span>
                                                        <input type="time" name="quinta3" aria-label="name"
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
                                                <input class="form-check-input"@checked(@explode(';', $ginasio->sexta)[0] == 'on') name="sexta1"
                                                    type="checkbox" id="sexta1">
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1">
                                                        <span id="basic-addon1"
                                                            class="input-group-text w-25">Inicio</span>
                                                        <input type="time" name="sexta2" aria-label="name"
                                                            value="{{ @explode(';', $ginasio->sexta)[1] }}"
                                                            aria-describedby="basic-addon1" class="form-control fw-bold">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1">
                                                        <span id="basic-addon1" class="input-group-text w-25">Fim</span>
                                                        <input type="time" name="sexta3" aria-label="name"
                                                            value="{{ @explode(';', $ginasio->sexta)[2] }}"
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
                                                <input class="form-check-input"@checked(@explode(';', $ginasio->sabado)[0] == 'on') name="sabado1"
                                                    type="checkbox" id="sabado1">
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1">
                                                        <span id="basic-addon1"
                                                            class="input-group-text w-25">Inicio</span>
                                                        <input type="time" name="sabado2" aria-label="name"
                                                            value="{{ @explode(';', $ginasio->sabado)[1] }}"
                                                            aria-describedby="basic-addon1" class="form-control fw-bold">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1">
                                                        <span id="basic-addon1" class="input-group-text w-25">Fim</span>
                                                        <input type="time" name="sabado3" aria-label="name"
                                                            value="{{ @explode(';', $ginasio->sabado)[2] }}"
                                                            aria-describedby="basic-addon1" class="form-control fw-bold">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
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

                            <div class="tab-pane fade profile-hours pt-3" id="profile-inscritos">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Telefone</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- {{ dd($inscritos) }} --}}
                                        @foreach ($ginasio->inscritos as $item)
                                            <tr>
                                                <td style="width: 10%">
                                                    <a href="{{ route('inscricoes.show', $item) }}"
                                                        class="btn btn-primary">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </a>
                                                </td>
                                                <td>{{ $item->nome }}</td>
                                                <td>{{ $item->telefone }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>

                                                    @if ($item->is_aprovado)
                                                        <div class="spinner-grow text-success"
                                                            style="height: 20px; width: 20px;" role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    @else
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 20px; width: 20px;" role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            @include('componentes.admin.deletar.inscricao', $item)
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
