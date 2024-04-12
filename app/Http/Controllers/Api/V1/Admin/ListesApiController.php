<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListeRequest;
use App\Http\Requests\UpdateListeRequest;
use App\Http\Resources\Admin\ListeResource;
use App\Models\Liste;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('liste_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ListeResource(Liste::with(['projet'])->get());
    }

    public function store(StoreListeRequest $request)
    {
        $liste = Liste::create($request->all());

        return (new ListeResource($liste))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Liste $liste)
    {
        abort_if(Gate::denies('liste_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ListeResource($liste->load(['projet']));
    }

    public function update(UpdateListeRequest $request, Liste $liste)
    {
        $liste->update($request->all());

        return (new ListeResource($liste))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Liste $liste)
    {
        abort_if(Gate::denies('liste_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liste->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
