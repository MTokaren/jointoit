@extends('adminlte::page')

@vite('resources/js/datatable.js')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">
    <a href="{{route('companies.create')}}" type="button" class="btn btn-success">Create</a>
    <table class="table datatable">
        <thead>
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
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td><img style="width:30px; height:30px" src="{{asset('storage/' . $item->logo)}}" alt="logo"></td>
                    <td>
                        <div style="display:flex">
                            <div>
                                <a href="{{route('companies.edit', $item->id)}}" type="button" class="btn btn-primary">Edit</a>
                            </div>
                            <div>
                                <form action="{{route('companies.destroy', $item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
