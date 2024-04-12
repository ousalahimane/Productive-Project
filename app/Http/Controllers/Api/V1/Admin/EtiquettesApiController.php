<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEtiquetteRequest;
use App\Http\Requests\UpdateEtiquetteRequest;
use App\Http\Resources\Admin\EtiquetteResource;
use App\Models\Etiquette;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EtiquettesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('etiquette_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EtiquetteResource(Etiquette::all());
    }

    public function store(StoreEtiquetteRequest $request)
    {
        $etiquette = Etiquette::create($request->all());

        return (new EtiquetteResource($etiquette))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Etiquette $etiquette)
    {
        abort_if(Gate::denies('etiquette_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EtiquetteResource($etiquette);
    }

    public function update(UpdateEtiquetteRequest $request, Etiquette $etiquette)
    {
        $etiquette->update($request->all());

        return (new EtiquetteResource($etiquette))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Etiquette $etiquette)
    {
        abort_if(Gate::denies('etiquette_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $etiquette->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
