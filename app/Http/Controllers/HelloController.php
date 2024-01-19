<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Specie;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //return view('hello', ['prenom' => $request->prenom, 'nom'=> $request->nom, 'numero' => $request->numero]);
        //return Animal::all();

        return Specie::with('animals')->paginate(2);

        $prenom = $request->prenom;
        $nom = $request->nom;
        $numero = $request->numero;

        $notes = [12, 5, 3,20];

        return view('hello', compact('prenom', 'nom', 'numero','notes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
