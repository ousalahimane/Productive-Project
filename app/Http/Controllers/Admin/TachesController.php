<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTachRequest;
use App\Http\Requests\StoreTachRequest;
use App\Http\Requests\UpdateTachRequest;
use App\Models\Etiquette;
use App\Models\Projet;
use App\Models\Tach;
use App\Models\Commentaire;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TachesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tach_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taches = Tach::with(['projet'])->get();

        return view('admin.taches.index', compact('taches'));
    }

    public function create()
    {
        // abort_if(Gate::denies('tach_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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

        // return view('admin.taches.create', compact('projets'));

        abort_if(Gate::denies('tach_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projets = Projet::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.taches.create', compact('projets'));
    }
    
    public function store(Request $request)
    {
        // dd($request);
        $tach = Tach::create($request->all());
        return redirect()->route('admin.taches.index');
    }

    public function edit(Tach $tach)
    {
        abort_if(Gate::denies('tach_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    
        $projets = Projet::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');
        $tach->load('projet');
    
        return view('admin.taches.edit', compact('projets', 'tach'));
    }
    

    public function update(UpdateTachRequest $request, Tach $tach)
    {
        $tach->update($request->all());
        return redirect()->route('admin.taches.index');
    }

    public function show(Tach $tach)
    {
        abort_if(Gate::denies('tach_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $tach->load('projet');
        return view('admin.taches.show', compact('tach'));
    }

    public function destroy(Tach $tach)
    {
        abort_if(Gate::denies('tach_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $tach->delete();
        return back();
    }

    public function massDestroy(MassDestroyTachRequest $request)
    {
        $taches = Tach::find(request('ids'));
        foreach ($taches as $tach) {
            $tach->delete();
        }
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function comment(Tach $tache){
        return view('admin.taches.comment',compact('tache'));
    }
    public function commentaire(Tach $tache){
        return view('admin.taches.commentaire',compact('tache'));
    }
    public function storecomment(Request $request)
    {
        // $commentaire = Commentaire::create($request->all());
        $commentaire = new Commentaire();
        $commentaire->contenu = $request['contenu'];
        $commentaire->user_id = $request['user_id'];
        $commentaire->tache_id = $request['tache_id'];
        $commentaire->save();
        return redirect()->back();
    }
}
