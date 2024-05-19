@extends('admin.template')
@section('title', 'Lista de utilizadores')

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="pagetitle">
                <h1>Lista de utilizadores</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Utilizadores</li>
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
                        <h5 class="card-title">Utilizadores</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($utilizadores as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->telefone }}</td>
                                        <td>{{ $item->email }}</td>
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
