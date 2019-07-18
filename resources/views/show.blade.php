@extends('layouts.app')


@push('css')

@endpush

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{--@foreach($ad as $a)--}}
                    <div class="card mb-3" style="width: 100%;">
                        <div class="card-header"><h5>{{ $ad->title }}</h5></div>
                        <img class="card-img-top" src="https://via.placeholder.com/350x150" alt="">
                        <div class="card-body">
                            {{--<h5 class="card-title">{{ $ad->title }}</h5>--}}
                            <small class="float-right"><span class="badge badge-dark">{{ $ad->created_at->diffForHumans() }}</span></small>
                            <p class="card-text">{{ $ad->description,150 }}</p>
                            <h6><span class="badge badge-primary">{{ $ad->location }}</span></h6>
                            <hr>
                            <a href="{{ route('ad.index') }}" class="btn btn-outline-primary">Go Back</a>
                            <a href="{{ route('message.create',['seller_id' => $ad->user_id, 'ad_id' => $ad->id]) }}" class="btn btn-outline-primary float-right">Contact to Seller</a>
                        </div>
                    </div>
                {{--@endforeach--}}
            </div>
        </div>
    </div>

@endsection

@push('js')

@endpush