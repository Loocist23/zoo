<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouvel Animal Crée</title>
</head>
<body>
<h1>Un nouvel animal a été ajouté</h1>
<p>Nom de l'animal : {{ $animal->name }}</p>
<p>Sexe: {{ $animal->sex ? 'Male' : 'Femelle' }}</p>
<p>Date de naissance : {{$animal->birthday->format('d/m/Y')}}</p>
</body>
</html>
