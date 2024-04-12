<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class MesProjetsController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        abort_if(Gate::denies('projet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $projets = Projet::all();
        // $userId = Auth::id();
        // $user = Auth::user();
        
        // $projetsCrees = $user->projets;
        // $projetsParticipes = $user->teams;
              
        // $projets = DB::table('projets')
        // ->leftJoin('projet_user', 'projets.id', '=', 'projet_user.projet_id')
        // ->where('projets.created_by', $userId)
        // ->orWhere('projet_user.user_id', $userId)
        // ->pluck('projets.nom', 'projets.id')
        // ->toArray();
        return view('admin.MesProjets', compact('projets'));
    }

}
