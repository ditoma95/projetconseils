<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\MentorProblem;
use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProblemController extends Controller
{
    //

    public function index()
    {
        //
        $mentors = Mentor::all();
        $mes_problems = Problem:: where('user_id', auth()->user()->id)->get();

        return view('problemes.index', [
            'mentors' => $mentors,
            'mes_problems' => $mes_problems
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'context' => 'required',
            'contenu' => 'required',
            'mentors' => 'required'

        ]);



        // dd($request->all());

        $problem = new Problem();
        $problem->context = $request->context;
        $problem->contenu = $request->contenu;
        $problem->user_id = auth()->user()->id;
        $problem->save();


        // $listeCleValeur = [];
        // foreach ($request->mentors as $cle => $valeur) {
        //     $listeCleValeur[] = ['problem_id' => $problem->id, 'mentor_id' => $valeur];
        // }

        // dd($listeCleValeur);
        $mentors = $request->mentors;
        $problem_id = $problem->id;

        // $elements = array_map(function ($mentor) use ($problem) {
        //     return [
        //         'problem_id' => $problem->id,
        //         'mentor_id' => $mentor,
        //     ];
        // }, $mentors);

        // // dd($elements);

        DB::transaction(function () use ($mentors,$problem_id) {
            foreach ($mentors as $element) {
                // Effectuer les opérations que vous souhaitez effectuer dans la boucle
                // Par exemple, insérer des données dans la base de données
                MentorProblem::create(['problem_id' => $problem_id,'mentor_id'=>$element]);
            }
        });

        // $mentor = Mentor::find($request->id);

        // $mentor = Mentor::find($request->id);
        return back()->with('success', 'Votre probleme a été envoyé avec succès');
    }

    public function show($id)
    {

        $problem = Problem::find($id);
        $mentor_problem = MentorProblem::where('problem_id', $id)->get();
        // $mentors = Mentor::all();

      
        return view("problemes.view_conseil", [
            'problem' => $problem,
            'mentor_problem' => $mentor_problem,
            // 'mentors' => $mentors
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
