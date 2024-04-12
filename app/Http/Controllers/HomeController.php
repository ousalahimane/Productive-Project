<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Tach;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function index(Request $request)
    // {
    //     $etat = $request->input('etat'); // Get the selected state value from the request

    //     $query = Tach::query(); // Start with a base query

    //     if ($etat) {
    //         $query->where('etat', $etat); // Apply the state filtering if a value is selected
    //     }

    //     $taches = $query->with(['projet', 'etiquettes'])->get(); // Execute the query

    //     return view('home', compact('taches'));
    // }



    public function index($projet_id)
    {
        $taches = Tach::where('projet_id', $projet_id)->get();
        // Pass the retrieved tasks to your view
        return view('home', ['taches' => $taches]);
    }

    public function home()
    {   

        $projets = Projet::all();
        // $projets = Projet::pluck('nom')->toArray();
        return view('admin.MesProjets', compact('projets'));
    }

    public function tache(Projet $projet)
{
    // $taches = Tach::where('projet_id', $projet->id)->get();
    $taches = Tach::all();

    return view('home', compact('taches'));
}

    


}


