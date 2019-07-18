@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row justify-content-center">
            @foreach($ad as $a)
            <div class="card border-secondary mb-3 mr-3" style="max-width: 18rem;">
                <div class="card-header bg-secondary"><span class="text-white">Advertise</span><span class="badge badge-warning float-right">New</span></div>
                <div class="card-body text-secondary">
                    <h5 class="card-title">{{ Str::limit($a->title,25) }}</h5>
                    <p class="card-text">{{ Str::limit($a->description,90) }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
