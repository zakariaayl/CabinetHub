@extends('layouts.app')

@section('title', 'Gestion des demandes de congés')

@section('content')
  <div class="max-w-7xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Demandes de congés</h1>
    <livewire:rh.conges-filter />
  </div>
@endsection
