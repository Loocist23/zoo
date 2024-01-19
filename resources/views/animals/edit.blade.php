@extends('layouts.app') {{-- Assure-toi d'avoir un layout principal appelé app --}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Animal') }}</div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('animals.update', $animal->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Champ pour la gestion de l'image --}}
                            <div class="mb-3">
                                <label for="image" class="form-label d-block">Image de l'animal</label>

                                @if($animal->image)
                                    <div class="text-center mb-3">
                                        <img height="200" src="{{asset($animal->image)}}" alt="Photo de profil de {{$animal->name}}" class="d-block">
                                    </div>
                                @endif

                                <input type="file" class="form-control" name="image" id="image">
                                @error('image')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            {{-- Champ pour le nom --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $animal->name }}" required autofocus>
                            </div>

                            {{-- Champ pour le sexe --}}
                            <div class="mb-3">
                                <label for="sex" class="form-label">{{ __('Sex') }}</label>
                                <select class="form-select" id="sex" name="sex">
                                    <option value="1" {{ $animal->sex ? 'selected' : '' }}>{{ __('Male') }}</option>
                                    <option value="0" {{ !$animal->sex ? 'selected' : '' }}>{{ __('Female') }}</option>
                                </select>
                            </div>

                            {{-- Champ pour la date de naissance --}}
                            <div class="mb-3">
                                <label for="birthday" class="form-label">{{ __('Birthday') }}</label>
                                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $animal->birthday->format('Y-m-d') }}" required>
                            </div>

                            {{-- Champ pour la date de décès --}}
                            <div class="mb-3">
                                <label for="death" class="form-label">{{ __('Death') }} ({{ __('optional') }})</label>
                                <input type="date" class="form-control" id="death" name="death" value="{{ $animal->death ? $animal->death->format('Y-m-d') : '' }}">
                            </div>

                            {{-- Champ pour la gestion des espèces --}}
                            <div class="mb-3">
                                <label for="specie_id" class="form-label">{{ __('Specie') }}</label>
                                <select class="form-select" id="specie_id" name="specie_id" aria-label="Selection de l'espèce">
                                    @foreach($species as $specie)
                                        <option value="{{$specie->id}}" @selected($specie->id === $animal->specie->id) >{{$specie->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Bouton de soumission --}}
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
