<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReunionRequest;
use App\Http\Requests\UpdateReunionRequest;
use App\Http\Resources\Admin\ReunionResource;
use App\Models\Reunion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReunionsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reunion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReunionResource(Reunion::with(['participants'])->get());
    }

    public function store(StoreReunionRequest $request)
    {
        $reunion = Reunion::create($request->all());
        $reunion->participants()->sync($request->input('participants', []));

        return (new ReunionResource($reunion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Reunion $reunion)
    {
        abort_if(Gate::denies('reunion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReunionResource($reunion->load(['participants']));
    }

    public function update(UpdateReunionRequest $request, Reunion $reunion)
    {
        $reunion->update($request->all());
        $reunion->participants()->sync($request->input('participants', []));

        return (new ReunionResource($reunion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Reunion $reunion)
    {
        abort_if(Gate::denies('reunion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reunion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
