@extends('adminlte::page')

@section('content')
    <div class="px-3 py-3">
        <form action="{{route('companies.update', $company->id)}}" method="POST" enctype= multipart/form-data>
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value={{old('name') ?? $company->name}}>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value={{old('email') ?? $company->email}}>
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website" value={{old('website') ?? $company->website}}>
            </div>
            @if($company->logo)
            <div>
                <span>Current logo:</span>
                <img style="width:75px; height: 75px" src="{{asset('storage/' . $company->logo)}}" alt="logo">
            </div>
            @endif
            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo">
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
