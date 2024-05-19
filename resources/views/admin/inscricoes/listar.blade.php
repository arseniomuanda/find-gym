@extends('admin.template')
@section('title', 'Lista de Inscrições')

@section('content')
    <div class="row">
        <div class="col-10">
            <div class="pagetitle">
                <h1>Lista de inscrições</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Inscrições</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Inscrições</h5>
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
                                    <th scope="col">Ginasio</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inscricoes as $item)
                                    <tr>
                                        <td style="width: 10%">
                                            <a href="{{ route('inscricoes.show', $item) }}" class="btn btn-primary">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                        </td>
                                        <td>{{ $item->nome }}</td>
                                        <td>{{ $item->getGinasio->nome }}</td>
                                        <td>{{ $item->telefone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>

                                            @if ($item->is_aprovado)
                                                <div class="spinner-grow text-success" style="height: 20px; width: 20px;"
                                                    role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            @else
                                                <div class="spinner-grow text-danger" style="height: 20px; width: 20px;"
                                                    role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td align="center" style="width: 10%">
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#visitaDelet{{ $item->id }}">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @include('componentes.admin.deletar.inscricao', $item)
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
