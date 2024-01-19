@extends('layouts.app')
@section('title', 'Accueil')
@section('content')
    <p>Bonjour {!! $prenom !!} {{$nom}}</p>
    {{-- Commentaire blade--}}

    @if($numero > 18)
        <p>Bienvenue !</p>
    @else
        <p>Tu es trop jeune.</p>
    @endif
    <ul>
        @foreach($notes as $note)
            <li>Note : {{$note}}</li>
        @endforeach
    </ul>
@endsection
