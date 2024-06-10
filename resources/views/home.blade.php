@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
            @foreach ($movieList as $movie)
                <div class="col">
                    <div class="card h-100">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img src="{{ $movie->image }}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $movie->title }}</h5>
                                    <h6 class="card-subtitle">{{ $movie->original_title }}</h6>
                                    <span>Data di uscita: {{ date('d/m/Y', strtotime($movie->date)) }}</span>
                                    <div class="vote">
                                        {{ $movie->vote / 2}} <br>
                                        @php
                                            $empty = 5;
                                        @endphp
                                        @for ($i = 0; $i < (int) ($movie->vote / 2); $i++)
                                            @php
                                                $empty--;
                                            @endphp
                                            <i class="fa-solid fa-star"></i>
                                        @endfor
                                        @if ($movie->vote / 2 - ((int) ($movie->vote / 2)) > 0.69)
                                            <i class="fa-solid fa-star"></i>
                                            @php
                                                $empty--;
                                            @endphp
                                        @endif
                                        @if ($movie->vote / 2 - ((int) ($movie->vote / 2)) >= 0.5 && $movie->vote / 2 - ((int) ($movie->vote / 2)) < 0.69)
                                            <i class="fa-regular fa-star-half-stroke"></i>
                                            @php
                                                $empty--;
                                            @endphp
                                        @endif

                                        @for ($i = 0; $i < $empty; $i++)
                                        <i class="fa-regular fa-star"></i>
                                        @endfor


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
