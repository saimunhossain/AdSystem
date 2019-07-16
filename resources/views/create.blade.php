@extends('layouts.app')


@push('css')

@endpush

@section('content')
    <div class="container">
        <h1>Create your advertise here</h1>
        <hr>
        <form method="post" action="{{ route('ad.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title is here</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="title" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description is here</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="6" value="{{ old('description') }}" autocomplete="description" autofocus></textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="location">Location is here</label>
                <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id="location" value="{{ old('location') }}" autocomplete="location" autofocus>
                @error('location')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price is here</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" autocomplete="price" autofocus>
                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Publish advertise</button>
        </form>
    </div>
@endsection

@push('js')

@endpush