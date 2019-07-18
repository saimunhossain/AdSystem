@extends('layouts.app')


@push('css')

@endpush

@section('content')

    <div class="container">
        <h1>Type you message to seller</h1>
        <form method="post" action="{{ route('message.store') }}">
            @csrf
            <div class="form-group">
                <label for="content">Description is here</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" cols="30" rows="6" autocomplete="content" autofocus>{{ old('content') }}</textarea>
                @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <input type="hidden" name="seller_id" value="{{ $seller_id }}">
            <input type="hidden" name="ad_id" value="{{ $ad_id }}">
            <input type="hidden" name="buyer_id" value="{{ auth()->user()->id }}">
            <button type="submit" class="btn btn-outline-primary">Send Message</button>
        </form>
    </div>

@endsection

@push('js')

@endpush