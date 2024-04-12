<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProjetRequest;
use App\Http\Requests\UpdateProjetRequest;
use App\Http\Resources\Admin\ProjetResource;
use App\Models\Projet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjetsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('projet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjetResource(Projet::with(['type', 'teams'])->get());
    }

    public function store(StoreProjetRequest $request)
    {
        $projet = Projet::create($request->all());
        $projet->teams()->sync($request->input('teams', []));

        return (new ProjetResource($projet))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Projet $projet)
    {
        abort_if(Gate::denies('projet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjetResource($projet->load(['type', 'teams']));
    }

    public function update(UpdateProjetRequest $request, Projet $projet)
    {
        $projet->update($request->all());
        $projet->teams()->sync($request->input('teams', []));

        return (new ProjetResource($projet))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Projet $projet)
    {
        abort_if(Gate::denies('projet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projet->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
