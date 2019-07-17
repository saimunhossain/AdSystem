@extends('layouts.app')

@push('css')

@endpush

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            @foreach($ads as $ad)
                <div class="card mb-3" style="width: 100%;">
                    <img class="card-img-top" src="https://via.placeholder.com/350x150" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $ad->title }}</h5>
                        <small class="float-right">{{ $ad->created_at->diffForHumans() }}</small>
                        <p class="card-text">{{ $ad->description }}</p>
                        <h6><span class="badge badge-secondary">{{ $ad->location }}</span></h6>
                        <a href="" class="btn btn-success">Go Details</a>
                    </div>
                </div>
            @endforeach
                {{ $ads->links() }}
        </div>
    </div>
    </div>

@endsection

@push('js')

@endpush