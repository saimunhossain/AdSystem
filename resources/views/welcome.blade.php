@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <h2>Ad System</h2>
        </div>
    </div>
@endsection
