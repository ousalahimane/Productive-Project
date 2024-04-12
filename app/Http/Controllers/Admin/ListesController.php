<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyListeRequest;
use App\Http\Requests\StoreListeRequest;
use App\Http\Requests\UpdateListeRequest;
use App\Models\Liste;
use App\Models\Projet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('liste_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listes = Liste::with(['projet'])->get();

        return view('admin.listes.index', compact('listes'));
    }

    public function create()
    {
        abort_if(Gate::denies('liste_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projets = Projet::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.listes.create', compact('projets'));
    }

    public function store(StoreListeRequest $request)
    {
        $liste = Liste::create($request->all());

        return redirect()->route('admin.listes.index');
    }

    public function edit(Liste $liste)
    {
        abort_if(Gate::denies('liste_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projets = Projet::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $liste->load('projet');

        return view('admin.listes.edit', compact('liste', 'projets'));
    }

    public function update(UpdateListeRequest $request, Liste $liste)
    {
        $liste->update($request->all());

        return redirect()->route('admin.listes.index');
    }

    public function show(Liste $liste)
    {
        abort_if(Gate::denies('liste_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liste->load('projet', 'listTaches');

        return view('admin.listes.show', compact('liste'));
    }

    public function destroy(Liste $liste)
    {
        abort_if(Gate::denies('liste_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liste->delete();

        return back();
    }

    public function massDestroy(MassDestroyListeRequest $request)
    {
        $listes = Liste::find(request('ids'));

        foreach ($listes as $liste) {
            $liste->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
