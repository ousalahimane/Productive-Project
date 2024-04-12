<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEtiquetteRequest;
use App\Http\Requests\StoreEtiquetteRequest;
use App\Http\Requests\UpdateEtiquetteRequest;
use App\Models\Etiquette;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EtiquettesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('etiquette_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $etiquettes = Etiquette::all();

        return view('admin.etiquettes.index', compact('etiquettes'));
    }

    public function create()
    {
        abort_if(Gate::denies('etiquette_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.etiquettes.create');
    }

    public function store(StoreEtiquetteRequest $request)
    {
        $etiquette = Etiquette::create($request->all());

        return redirect()->route('admin.etiquettes.index');
    }

    public function edit(Etiquette $etiquette)
    {
        abort_if(Gate::denies('etiquette_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.etiquettes.edit', compact('etiquette'));
    }

    public function update(UpdateEtiquetteRequest $request, Etiquette $etiquette)
    {
        $etiquette->update($request->all());

        return redirect()->route('admin.etiquettes.index');
    }

    public function show(Etiquette $etiquette)
    {
        abort_if(Gate::denies('etiquette_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $etiquette->load('etiquetteTaches');

        return view('admin.etiquettes.show', compact('etiquette'));
    }

    public function destroy(Etiquette $etiquette)
    {
        abort_if(Gate::denies('etiquette_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $etiquette->delete();

        return back();
    }

    public function massDestroy(MassDestroyEtiquetteRequest $request)
    {
        $etiquettes = Etiquette::find(request('ids'));

        foreach ($etiquettes as $etiquette) {
            $etiquette->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
