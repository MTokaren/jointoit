@extends('adminlte::page')

@section('content')
    <a href="{{route('employees.create')}}" type="button" class="btn btn-success">Create</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->first_name}}</td>
                    <td>{{$item->last_name}}</td>
                    <td>{{$item->company->name ?? "No company"}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>
                        <div style="display:flex">
                            <div>
                                <a href="{{route('employees.edit', $item->id)}}" type="button" class="btn btn-primary">Edit</a>
                            </div>
                            <div>
                                <form action="{{route('employees.destroy', $item->id)}}" method="POST">
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

    <div class="d-flex justify-content-center fs-6">
        {{ $employees->links() }}
    </div>
@endsection
