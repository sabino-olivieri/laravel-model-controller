@extends('layouts.layout')
@section('content')
    <div class="container my-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4  g-3 justify-content-center">
            @foreach ($movieList as $movie)
                <div class="col">
                    <div class="card h-100">
                        <div class="row g-0">
                            <div class="col-md-6 d-flex align-items-center justify-content-start position-relative">
                                <img src="{{ $movie->image }}" class="img-fluid rounded-start poster " alt="Poster - {{ $movie->title }}">
                                <h5 class="position-absolute sub-title">{{ $movie->original_title }}</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $movie->title }}</h5>
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
                                            <i class="fa-star fa-solid "></i>
                                        @endfor
                                        @if ($movie->vote / 2 - ((int) ($movie->vote / 2)) > 0.69)
                                            <i class="fa-star fa-solid"></i>
                                            @php
                                                $empty--;
                                            @endphp
                                        @endif
                                        @if ($movie->vote / 2 - ((int) ($movie->vote / 2)) >= 0.5 && $movie->vote / 2 - ((int) ($movie->vote / 2)) < 0.69)
                                            <i class="fa-star-half-stroke fa-regular"></i>
                                            @php
                                                $empty--;
                                            @endphp
                                        @endif

                                        @for ($i = 0; $i < $empty; $i++)
                                        <i class="fa-star fa-regular"></i>
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
