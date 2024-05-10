<?php

namespace App\Http\Controllers;

use App\Models\Conseil;
use App\Models\Mentor;
use Illuminate\Http\Request;

class ConseilController extends Controller
{
    //

    public function index()
    {

        $mentor = Mentor::where('user_id', 1)->first();
        $problems = $mentor->problems;
        

        return view("mentors.views_troubles",[
            'problems' => $problems,
            'mentor' => $mentor,
        ]);
    }

    public function store(Request $request)
    {
        
       $request->validate([
            'problem_id' => 'required',
            'reponse' => 'required',
        ]);

        //FIXE-ME: change r id en auth
        // $request->mentor_id = 1;
        Conseil::create([
            'problem_id' => $request->problem_id,
            'reponse' => $request->reponse,
            'mentor_id' =>1
        ]);

      

        return redirect()->back();
    }

}