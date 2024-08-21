@extends('adminlte::page')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Edit Company</h2>

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $company->name }}">
            </div>

            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ?? $company->email }}">
            </div>

            <div class="form-group mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="text" name="website" id="website" class="form-control" value="{{ old('website') ?? $company->website }}">
            </div>

            @if($company->logo)
                <div class="mb-3">
                    <span class="d-block mb-2">Current logo:</span>
                    <img style="width: 75px; height: 75px;" src="{{ asset('storage/' . $company->logo) }}" alt="logo" class="img-fluid">
                </div>
            @endif

            <div class="form-group mb-3">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" name="logo" id="logo" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
