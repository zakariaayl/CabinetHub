@extends('layouts.app')

@section('title', 'Documents RH')

@section('content')
<div class="bg-white border border-gray-200 rounded-lg shadow p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-4 md:mb-0">Documents RH</h1>
        <div class="flex gap-3">
            <input type="text" placeholder="Rechercher un document..."
                   class="border rounded-lg px-4 py-2 w-full md:w-72 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <a href="#"
               class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition flex items-center gap-2">
               <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                   <path stroke-linecap="round" stroke-linejoin="round"
                         d="M12 4v16m8-8H4"/>
               </svg>
               Ajouter un document
            </a>
        </div>
    </div>

    <!-- Categories grid -->
    <h2 class="text-xl font-semibold text-gray-700 mb-3">Catégories</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-6">
        @foreach($categories as $cat)
            <div class="bg-blue-50 rounded-lg p-4 hover:bg-blue-100 cursor-pointer transition shadow-sm hover:shadow-md">
                <h3 class="text-lg font-medium text-blue-800">{{ $cat }}</h3>
            </div>
        @endforeach
    </div>

    <!-- Table of documents -->
    <h2 class="text-xl font-semibold text-gray-700 mb-3">Documents</h2>
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse text-gray-700">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">Nom du document</th>
                    <th class="border px-4 py-2 text-left">Catégorie</th>
                    <th class="border px-4 py-2 text-left">Date de création</th>
                    <th class="border px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-50 transition">
                    <td class="border px-4 py-2">Contrat CDI - Jean Dupont</td>
                    <td class="border px-4 py-2">Contrats</td>
                    <td class="border px-4 py-2">12/08/2025</td>
                    <td class="border px-4 py-2 flex gap-2">
                        <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Voir
                        </button>
                        <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18.5 2.5l3 3L12 15l-3-3L18.5 2.5z"/>
                            </svg>
                            Modifier
                        </button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Supprimer
                        </button>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition">
                    <td class="border px-4 py-2">Offre Stage Marketing</td>
                    <td class="border px-4 py-2">Recrutement / Offre</td>
                    <td class="border px-4 py-2">10/08/2025</td>
                    <td class="border px-4 py-2 flex gap-2">
                        <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition flex items-center gap-1">Voir</button>
                        <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition flex items-center gap-1">Modifier</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition flex items-center gap-1">Supprimer</button>
                    </td>
                </tr>
                <!-- Ici on pourra boucler sur les documents dynamiquement -->
            </tbody>
        </table>
    </div>

    <!-- Pagination placeholder -->
    <div class="mt-6 flex justify-center">
        <nav class="inline-flex">
            <a href="#" class="px-3 py-1 border rounded-l-lg bg-gray-100 hover:bg-gray-200">Précédent</a>
            <a href="#" class="px-3 py-1 border-t border-b bg-gray-100 hover:bg-gray-200">1</a>
            <a href="#" class="px-3 py-1 border-t border-b bg-gray-100 hover:bg-gray-200">2</a>
            <a href="#" class="px-3 py-1 border rounded-r-lg bg-gray-100 hover:bg-gray-200">Suivant</a>
        </nav>
    </div>
</div>
@endsection
