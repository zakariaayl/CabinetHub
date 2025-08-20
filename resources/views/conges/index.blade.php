@extends('layouts.app')

@section('title', 'Gestion des demandes de congés')

@section('content')
<div class="border col-span-12 mx-auto border-gray-200 shadow shadow-gray-300 px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6"">Demandes de congés</h1>
    <livewire:rh.conges-filter />
</div>
@endsection
