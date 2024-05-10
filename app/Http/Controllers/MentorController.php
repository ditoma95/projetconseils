<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConducteurRequest;
use App\Http\Requests\UpdateConducteurRequest;
use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $mentor = Mentor::where('user_id', auth()->user()->id)->first();
        $problems = $mentor->problems;
        

        return view("mentors.views_troubles",[
            'problems' => $problems,
            'mentor' => $mentor,
        ]);
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
    public function show(Mentor $conducteur, Request $request)
    {


        if ($request->hasFile('permis_image')) {
            $permisImagePath = $request->file('permis_image')->store('public/permis');
        } else {
            $permisImagePath = null;
        }

        $conducteur = new Mentor();
        $conducteur->user_id = $request->user()->id;
        $conducteur->permis_image = $permisImagePath;
        $conducteur->save();
        return redirect()->route('login');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mentor $conducteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConducteurRequest $request, Mentor $conducteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mentor $conducteur)
    {
        //
    }
}
