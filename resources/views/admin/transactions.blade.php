@extends('Layout.layoutAdmin')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Surveillance des transactions</h1>

        <div class="carousel-card relative border border-solid border-gray-200 rounded-2xl p-4 transition-all duration-500">
            <h2 class="font-bold mb-6">Transactions par Groover</h2>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($groovers as $groover)
                        <div class="swiper-slide">
                            <div class="relative max-w-xs border border-solid border-gray-200 rounded-2xl p-4 transition-all duration-500 card">
                                <h4 class="text-base font-semibold text-gray-900 mb-2 capitalize transition-all duration-500">{{ $groover->name }} {{ $groover->firstname }}</h4>
                                <p class="text-sm font-normal text-gray-500 transition-all duration-500 leading-5 mb-4">Nombre de groovies : {{ $groover->nb_groovies }}</p>
                                <p class="text-sm font-normal text-gray-500 transition-all duration-500 leading-5 mb-4">Niveau : {{ $groover->level }}</p>
                                <a href="javascript:;" class="group flex items-center gap-2 text-sm font-semibold text-indigo-600 transition-all duration-500">Détail
                                    <svg class="transition-all duration-500 group-hover:translate-x-1" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.25 9L14.25 9M10.5 13.5L14.4697 9.53033C14.7197 9.28033 14.8447 9.15533 14.8447 9C14.8447 8.84467 14.7197 8.71967 14.4697 8.46967L10.5 4.5" stroke="#4F46E5" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <style>
        .swiper-container {
            width: 100%;
            padding: 20px 0;
        }
        .swiper-slide {
            display: flex;
            justify-content: center;
        }
        .card {
            width: 100%;
            max-width: 300px;
        }
        .carousel-card {
            position: relative;
            overflow: hidden;
        }
        .swiper-button-next, .swiper-button-prev {
            top: 50%;
            transform: translateY(-50%);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let swiper = new Swiper('.swiper-container', {
                slidesPerView: 4,
                spaceBetween: 20,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        });
    </script>
@endsection
