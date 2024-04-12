<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTachRequest;
use App\Http\Requests\UpdateTachRequest;
use App\Http\Resources\Admin\TachResource;
use App\Models\Tach;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TachesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tach_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TachResource(Tach::with(['list', 'etiquettes'])->get());
    }

    public function store(StoreTachRequest $request)
    {
        $tach = Tach::create($request->all());
        $tach->etiquettes()->sync($request->input('etiquettes', []));

        return (new TachResource($tach))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Tach $tach)
    {
        abort_if(Gate::denies('tach_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TachResource($tach->load(['list', 'etiquettes']));
    }

    public function update(UpdateTachRequest $request, Tach $tach)
    {
        $tach->update($request->all());
        $tach->etiquettes()->sync($request->input('etiquettes', []));

        return (new TachResource($tach))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tach $tach)
    {
        abort_if(Gate::denies('tach_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tach->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
