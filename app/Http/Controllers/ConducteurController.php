<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConducteurRequest;
use App\Http\Requests\UpdateConducteurRequest;
use App\Models\Conducteur;
use Illuminate\Http\Request;

class ConducteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreConducteurRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Conducteur $conducteur, Request $request)
    {


        if ($request->hasFile('permis_image')) {
            $permisImagePath = $request->file('permis_image')->store('public/permis');
        } else {
            $permisImagePath = null;
        }

        $conducteur = new Conducteur();
        $conducteur->user_id = $request->user()->id;
        $conducteur->permis_image = $permisImagePath;
        $conducteur->save();
        return redirect()->route('login');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conducteur $conducteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConducteurRequest $request, Conducteur $conducteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conducteur $conducteur)
    {
        //
    }
}
