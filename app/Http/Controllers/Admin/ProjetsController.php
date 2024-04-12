<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProjetRequest;
use App\Http\Requests\StoreProjetRequest;
use App\Http\Requests\UpdateProjetRequest;
use App\Models\Projet;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProjetsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('projet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projets = Projet::with(['teams'])->get();
        // dd($projets->first->id);
        return view('admin.projets.index', compact('projets'));
    }

    public function create()
    {
        abort_if(Gate::denies('projet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $teams = User::pluck('name', 'id');

        return view('admin.projets.create', compact('teams'));
    }

    public function store(StoreProjetRequest $request)
    {
        $projet = Projet::create($request->all());
        $projet->teams()->sync($request->input('teams', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $projet->id]);
        }

        return redirect()->route('admin.projets.index');
    }

    public function edit(Projet $projet)
    {
        abort_if(Gate::denies('projet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = User::pluck('name', 'id');

        $projet->load('teams');

        return view('admin.projets.edit', compact('projet', 'teams'));
    }

    public function update(UpdateProjetRequest $request, Projet $projet)
    {
        $projet->update($request->all());
        $projet->teams()->sync($request->input('teams', []));

        return redirect()->route('admin.projets.index');
    }

    public function show(Projet $projet)
    {
        abort_if(Gate::denies('projet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projet->load('teams', 'projetTaches');

        return view('admin.projets.show', compact('projet'));
    }

    public function destroy(Projet $projet)
    {
        abort_if(Gate::denies('projet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projet->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjetRequest $request)
    {
        $projets = Projet::find(request('ids'));

        foreach ($projets as $projet) {
            $projet->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('projet_create') && Gate::denies('projet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Projet();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function tache(Projet $projet){

        $projet->load('teams', 'projetTaches');

        return view('admin.projets.tache', compact('projet'));
    }
    public function taches(Projet $projet){

        $projet->load('teams', 'projetTaches');

        return view('admin.projets.tache', compact('projet'));
    }
}
