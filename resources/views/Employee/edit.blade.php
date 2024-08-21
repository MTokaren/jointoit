@extends('adminlte::page')

@section('content')
    <div class="px-3 py-3">
        <form action="{{route('employees.update', $employee->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" value={{old('first_name') ?? $employee->first_name}}>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" value={{old('last_name') ?? $employee->last_name}}>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="phone" name="phone" value={{old('phone') ?? $employee->phone}}>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value={{old('email') ?? $employee->email}}>
            </div>
            <div class="form-group">
                <label for="company_id">Company</label>
                <select name="company_id">
                    @foreach($companies as $id => $name)
                    <option value={{$id}} {{ ($employee->company_id == $id && null != (old('company_id')) || old('company_id') == $id) ? 'selected' : '' }}>{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
    <div class="px-3 py-3">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    
@endsection
