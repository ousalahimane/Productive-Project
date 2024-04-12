<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeProjetRequest;
use App\Http\Requests\UpdateTypeProjetRequest;
use App\Http\Resources\Admin\TypeProjetResource;
use App\Models\TypeProjet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypeProjetsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('type_projet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TypeProjetResource(TypeProjet::all());
    }

    public function store(StoreTypeProjetRequest $request)
    {
        $typeProjet = TypeProjet::create($request->all());

        return (new TypeProjetResource($typeProjet))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TypeProjet $typeProjet)
    {
        abort_if(Gate::denies('type_projet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TypeProjetResource($typeProjet);
    }

    public function update(UpdateTypeProjetRequest $request, TypeProjet $typeProjet)
    {
        $typeProjet->update($request->all());

        return (new TypeProjetResource($typeProjet))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TypeProjet $typeProjet)
    {
        abort_if(Gate::denies('type_projet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeProjet->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
