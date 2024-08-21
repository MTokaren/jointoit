@extends('adminlte::page')

@vite('resources/js/datatable.js')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">

    <div>
        <div class="row mb-3">
            <div class="col-12 text-end">
                <a href="{{ route('companies.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Create
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Companies List</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered datatable">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <img style="width: 30px; height: 30px" src="{{ asset('storage/' . $item->logo) }}" alt="logo">
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div>
                                            <a href="{{ route('companies.edit', $item->id) }}" class="btn btn-primary me-2">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                        </div>
                                        <div>
                                            <form action="{{ route('companies.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
