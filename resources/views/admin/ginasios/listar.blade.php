@extends('admin.template')
@section('title', 'Lista de ginagios')

@section('content')
    <div class="row">
        <div class="col-10">
            <div class="pagetitle">
                <h1>Lista de ginágios</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Ginásios</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
        </div>
        <div class="col-2">
            <a href="{{ route('admin.ginasios.adicionar') }}" class="btn btn-primary">Adicionar ginágio</a>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ginásios</h5>
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
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Clientes</th>
                                    <th scope="col">Data de início</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ginasios as $item)
                                    
                                <tr>
                                    <td style="width: 10%">
                                        <a href="{{ route('admin.ginasios.perfil', $item) }}" class="btn btn-primary">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                    </td>
                                    <td>{{ $item->nome }}</td>
                                    <td>{{ $item->getCategoria->nome }}</td>
                                    <td>{{ $item->nome }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td align="center" style="width: 10%">
                                        <button class="btn btn-danger">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </td>
                                </tr>
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
