@extends('site.template')
@section('title', 'Lista de ginagios')

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <form method="POST" id="pesquisar" onsubmit="event.preventDefault();appVue.pesquisar(this)">
                            <h5 class="card-title">Filtros</h5>
                            <div class="row mb-2">
                                <div class="search-bar mb-2">
                                    <div class="row">
                                        <div class="search-form d-flex align-items-center">
                                            <input type="text" name="query" placeholder="Pesquisar"
                                                style="
                                                font-size: 14px;
                                                color: #012970;
                                                border: 1px solid rgba(1, 41, 112, 0.2);
                                                padding: 7px 38px 7px 8px;
                                                border-radius: 3px;
                                                transition: 0.3s;
                                                width: 100%;
                                            ">
                                        </div>
                                    </div>
                                    <hr>

                                    <h6 class="card-text">Caregorias</h6>
                                    <div class="row">
                                        <div class="row mb-5">
                                            @foreach ($categorias as $item)
                                                <div class="col-sm-10">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" name="cat-{{ $item->id }}"
                                                            type="checkbox" id="cat-{{ $item->id }}">
                                                        <label class="form-check-label"
                                                            for="cat-{{ $item->id }}">{{ $item->nome }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div><!-- End Search Bar -->
                            </div>
                            <button type="submit" class="btn btn-primary">Pesquisar</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="isLoading" v-if="isLoading" :class="`${isLoading ? 'display' : ''}`" class="loading w-100">
                    <div class="position-relative">
                        <div class="loader-container">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="isWelcome" v-if="isWelcome">
                    <div class="position-absolute">
                    </div>
                </div>
                <div v-else id="gyms" :class="`${!isLoading ? 'display' : ''}`">
                    <!-- Card with an image on left -->
                    <div v-for="item in ginasios" class="card mb-3">
                        <form :id="'form-' + item.id" action="{{ route('visita') }}" method="post">
                            @csrf
                            <input type="hidden" :value="item.id" name="ginasio">
                        </form>
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img :src="'./uploads/' + item.imagem" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a type="button" @click="setVisita(item.id)" {{-- :href="'/site/detalhes/' + item.id" --}}>
                                        <h5 class="card-title">@{{ item.nome }}</h5>
                                    </a>
                                    <p class="card-text">@{{ item.sobre }}</p>
                                </div>
                                {{-- tendo de enviar uma requisiçao que vai adicionar uma visita e só assim ir para a pagina --}}
                                <div class="position-absolute" style="bottom: 30px; right: 30px;">
                                    <a type="button" @click="setVisita(item.id)" class="btn btn-primary">Ver mais</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Card with an image on left -->
                </div>
            </div>

        </div>
    </section>
@endsection
