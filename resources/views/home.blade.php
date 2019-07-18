@extends('layouts.app')

@push('css')
    <style>
        /* Chat containers */
        .cont {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        /* Clear floats */
        .cont::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Style images */
        .cont img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }

        /* Style time text */
        .time-right {
            float: right;
            color: #aaa;
        }

    </style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($messages as $message)
                        <div class="cont">
                            <img class="img-rounded" src="https://via.placeholder.com/80x80" alt="Avatar">
                            <p><span class="badge badge-primary float-right">{{ getBuyerName($message->buyer_id) }}</span></p>
                            <p>{{ $message->content }}</p>
                            <span class="time-right">{{ $message->created_at->diffForHumans() }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
