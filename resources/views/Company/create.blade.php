@extends('adminlte::page')

@section('content')
    <div class="px-3 py-3">
        <form action="{{route('companies.store')}}" method="POST" enctype= multipart/form-data>
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website" value="{{old('website')}}">
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo">
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
