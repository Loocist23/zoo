<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backoffice\AnimalStoreRequest;
use App\Http\Requests\Backoffice\AnimalUpdateRequest;
use App\Mail\AnimalCreated;
use App\Models\Animal;
use App\Models\Specie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::with('specie')
                    ->paginate(10);
        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $species = Specie::all();
        return view('animals.create', compact('species'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimalStoreRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $specie = Specie::where('name', $validatedData['specie_name'])->first();

            $animal = Animal::create($validatedData);

            $animal->specie()->associate($specie);
            $animal->save();

            Mail::to(env("ADMIN_EMAIL"))->send(new AnimalCreated($animal));

            return redirect()->route('animals.index')->with(['status' => 'success', 'message' => 'Animal ajouté avec succes']);
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with(['status' => 'danger', 'message' => 'Une erreur c\'est produite']);
        }
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
    public function edit(Animal $animal)
    {
        $species = Specie::all();
        return view('animals.edit', compact('animal', 'species'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimalUpdateRequest $request,Animal $animal)
    {
        try {
            $validatedData = $request->validated();
            if ($request->hasFile('image'))
            {
                if ($animal->image && $animal->image !== config('image.animals_image_default'))
                {
                    Storage::delete($animal->image);
                }
                $validatedData['image'] = $request->file('image')->store(config('image.animals_image'),'public');
            }
            $animal->update($validatedData);


            return redirect()->route('animals.index')->with(['status' => 'success', 'message' => 'Animal modifié avec succes']);
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with(['status' => 'danger', 'message' => 'Une erreur c\'est produite']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
