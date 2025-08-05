@extends('layouts.app')

@section('title', 'Tableau de bord RH')

@section('content')
    <div class="border border-gray-200 shadow shadow-gray-300 px-4 py-8">
        <!-- HEADER + NAVIGATION -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Tableau de Bord RH</h1>
            <!--nav class="flex space-x-4 text-blue-600 font-medium">
                <a href="{{ route('postes.index') }}" class="hover:underline"> Fiches de poste</a>
                <a href="#" class="hover:underline"> Absences / Congés</a>
                <a href="#" class="hover:underline"> Documents RH</a>
                <a href="#" class="hover:underline"> Formations et Évaluations</a>
            </--nav-->
        </div>
        <livewire:rh.collaborateur-filter />

        <!-- Pagination -->
        <div class="mt-4 flex justify-center">
            {{ $collaborateurs->links() }}
        </div>

        <div class="mt-6 flex justify-center">
            <a href="{{ route('collaborateurs.create') }}"
               class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700 transition duration-300">
                + Ajouter un collaborateur
            </a>
        </div>
    </div>

    @if (session('success') || session('danger'))
        <div
            id="flash-message"
            class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 px-6 py-4 rounded-md shadow-lg text-white text-center
                {{ session('success') ? 'bg-green-500' : 'bg-red-500' }}"
            role="alert"
        >
            @if (session('success')) ✅ {{ session('success') }} @endif
            @if (session('danger')) ❌ {{ session('danger') }} @endif
        </div>

        <script>
            setTimeout(() => {
                const toast = document.getElementById('flash-message');
                if (toast) {
                    toast.style.opacity = '0';
                    toast.style.transition = 'opacity 0.5s';
                    setTimeout(() => toast.remove(), 500);
                }
            }, 3000);
        </script>
    @endif
@endsection
