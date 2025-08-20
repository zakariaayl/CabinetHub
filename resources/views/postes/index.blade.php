@extends('layouts.app')

@section('title', 'Fiches de poste')

@section('content')
<div class="border col-span-12 border-gray-200 shadow shadow-gray-300 px-4 py-8 max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Fiches de Poste</h1>

    @livewire('rh.poste-filter')
</div>


@include('partials.flash')
@endsection
