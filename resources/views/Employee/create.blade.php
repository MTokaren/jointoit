@extends('adminlte::page')

@section('content')
    <div class="px-3 py-3">
        <form action="{{route('employees.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" value="{{old('first_name')}}">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" value="{{old('last_name')}}">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="phone" name="phone" value="{{old('phone')}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="company_id">Company</label>
                <select name="company_id">
                    @foreach($companies as $id => $name)
                    <option value={{$id}} {{ old('company_id') == $id ? 'selected' : '' }}>{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
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
