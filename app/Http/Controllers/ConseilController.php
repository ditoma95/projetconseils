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

        try {
            //code...
        $mentor = Mentor::where('user_id', auth()->user()->id)->first();
        $problems = $mentor->problems;
        

        return view("mentors.views_troubles",[
            'problems' => $problems,
            'mentor' => $mentor,
        ]);
        } catch (\Throwable $th) {
            //throw $th;
            return view("errors.404");
        }

        
    }

    public function avis(Request $request){
        $request->validate([
            "conseil_id"=>"required",
            "message"=>"required"
        ]);

        $conseil = Conseil::find($request->conseil_id);
        $conseil->avis = $request->message;
        $conseil->save();
        
        return back()->with("success","Avis envoyé avec success");
    }

    public function store(Request $request)
    {
        
       $request->validate([
            'problem_id' => 'required',
            'reponse' => 'required',
        ]);

        //FIXE-ME: change r id en auth
        // $request->mentor_id = 1;
        $mentor = Mentor::where('user_id', auth()->user()->id)->first();

        Conseil::create([
            'problem_id' => $request->problem_id,
            'reponse' => $request->reponse,
            'mentor_id' =>$mentor->id
        ]);

      

        return redirect()->back();
    }

}
