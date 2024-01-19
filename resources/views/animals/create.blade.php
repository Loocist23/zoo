@extends('layouts.app')
@section('title', 'Ajouter un animal')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>{{ __("Add an animal") }}</h1>
            @include('partials.status')

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route("animals.store")}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nom de l'animal</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom de l'animal" value="{{old('name')}}">
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="sex" value="1" {{old('sex') == 1 ? 'checked' : ""}}>
                        <label class="form-check-label" for="sex">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="sex2" value="0" {{old('sex1') == 1 ? 'checked' : ""}}>
                        <label class="form-check-label" for="sex2">
                            Femelle
                        </label>
                    </div>
                    @error('sex')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="birthday" class="form-label">Date naissance</label>
                    <input type="date" class="form-control" name="birthday" id="birthday">
                    @error('birthday')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="death" class="form-label">Date mort</label>
                    <input type="date" class="form-control" name="death" id="death">
                    @error('death')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="specie_name" class="form-label">Datalist example</label>
                    <input class="form-control" list="species_list" id="specie_name" name="specie_name" placeholder="Rechercher une espece...">
                    <datalist id="species_list">
                        @foreach($species as $specie)
                            <option value="{{$specie->name}}">
                        @endforeach
                    </datalist>
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                </div>

            </form>
        </div>
    </div>
@endsection
