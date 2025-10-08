@extends('components.main')
@section('container')
    <div class="w-full h-[50vh] relative overflow-hidden">
        <img src="{{ asset($kontak->background) }}" class="w-full h-full object-cover absolute top-0 left-0 z-0 brightness-75"
            alt="Background">
    </div>

    <div class="lg:pt-[150px] pt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-0 md:px-8 2xl:px-0">
            <h1 class="mb-2 text-xl lg:text-[48px] font-semibold leading-tight text-black"">{{ $title ?? 'Informasi Kontak' }}</h1>
        </div>
    </div>
@endsection
