@extends('layouts.app')

@push('css')

@endpush

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ route('ad.search') }}" onsubmit="search(event)" id="searchForm">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="words" placeholder="Search your advertise" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            <div id="results">
                @foreach($ads as $ad)
                    <div class="card mb-3" style="width: 100%;">
                        <div class="card-header"><h5>{{ $ad->title }}</h5></div>
                        <img class="card-img-top" src="https://via.placeholder.com/350x150" alt="">
                        <div class="card-body">
                            {{--<h5 class="card-title">{{ $ad->title }}</h5--}}
                            <small class="float-right"><span class="badge badge-dark">{{ $ad->created_at->diffForHumans() }}</span></small>
                            <p class="card-text">{{ Str::limit($ad->description,150) }}</p>
                            <h6><span class="badge badge-primary">{{ $ad->location }}</span></h6>
                            <hr>
                            <a href="{{ route('ad.show',$ad->id) }}" class="btn btn-outline-primary">Go Details</a>
                            <a href="{{ route('message.create',['seller_id' => $ad->user_id, 'ad_id' => $ad->id]) }}" class="btn btn-outline-primary float-right">Contact to Seller</a>
                        </div>
                    </div>
                @endforeach
            </div>
                <div class="row justify-content-center">
                    {{ $ads->links() }}
                </div>
        </div>
    </div>
    </div>

@endsection

@push('js')
    <script>
        function search(event) {
            event.preventDefault();
            const words = document.querySelector('#words').value;
            const url = document.querySelector('#searchForm').getAttribute('action');
            axios.post(`${url}`, {
                words: words,
            })
            .then(function (response) {
                const ads = response.data.ads
                let results = document.querySelector('#results')
                results.innerHTML = ''
                for(let i = 0; i < ads.length; i++){
                    let card = document.createElement('div')
                    let cardBody = document.createElement('div')
                    cardBody.classList.add('card-body')
                    card.classList.add('card','mb-3')
                    let title = document.createElement('h5')
                    title.classList.add('card-header')
                    title.innerHTML = ads[i].title
                    let description = document.createElement('p')
                    description.classList.add('card-text')
                    description.innerHTML = ads[i].description
                    let location = document.createElement('h6')
                    location.classList.add('badge','badge-success')
                    location.innerHTML = ads[i].location
                    card.appendChild(title)
                    cardBody.appendChild(description)
                    cardBody.appendChild(location)
                    card.appendChild(cardBody)
                    results.appendChild(card)
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    </script>
@endpush