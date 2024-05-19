@extends('admin.template')
@section('title', 'Lista de categorias')

@section('content')
    <div class="row">
        <div class="col-10">
            <div class="pagetitle">
                <h1>Lista de categorias</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Categorias</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
        </div>
        <div class="col-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoriaAdd">Adicionar categoria</button>
            @include('componentes.admin.add.categoria')
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Categorias</h5>
                        {{-- <p>Add lightweight datatables to your project with using the <a
                                    href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple
                                    DataTables</a> library. Just add <code>.datatable</code> class name to any table you
                                wish to conver to a datatable. Check for <a
                                    href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more
                                    examples</a>.</p> --}}

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Descrição</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $item)
                                    <tr>
                                        <td style="width: 10%">
                                            <button data-bs-toggle="modal" data-bs-target="#categoriaEdit{{ $item->id }}"
                                                class="btn btn-primary">
                                                <i class="bi bi-eye-fill"></i>
                                            </button>
                                        </td>
                                        <td style="width: 20%">{{ $item->nome }}</td>
                                        <td>{{ Str::limit($item->descricao, env('GLOBAL_LIMIT'), '...') }}
                                        </td>
                                        <td align="center" style="width: 10%">
                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#categoriaDelet{{ $item->id }}">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @include('componentes.admin.editar.categoria', $item)
                                    @include('componentes.admin.deletar.categoria', $item)
                               @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
