@extends('layouts.app2')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-lg mt-20">
    <h1 class="text-xl font-bold mb-4">Infos extraites</h1>
    <pre class="bg-gray-100 p-4 rounded-xl whitespace-pre-wrap">{{ $text }}</pre>
</div>
@endsection
