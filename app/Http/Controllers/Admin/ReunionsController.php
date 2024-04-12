<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReunionRequest;
use App\Http\Requests\StoreReunionRequest;
use App\Http\Requests\UpdateReunionRequest;
use App\Models\Reunion;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReunionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reunion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reunions = Reunion::with(['participants'])->get();

        return view('admin.reunions.index', compact('reunions'));
    }

    public function create()
    {
        abort_if(Gate::denies('reunion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $participants = User::pluck('email', 'id');

        return view('admin.reunions.create', compact('participants'));
    }

    public function store(StoreReunionRequest $request)
    {
        $reunion = Reunion::create($request->all());
        $reunion->participants()->sync($request->input('participants', []));

        return redirect()->route('admin.reunions.index');
    }

    public function edit(Reunion $reunion)
    {
        abort_if(Gate::denies('reunion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $participants = User::pluck('email', 'id');

        $reunion->load('participants');

        return view('admin.reunions.edit', compact('participants', 'reunion'));
    }

    public function update(UpdateReunionRequest $request, Reunion $reunion)
    {
        $reunion->update($request->all());
        $reunion->participants()->sync($request->input('participants', []));

        return redirect()->route('admin.reunions.index');
    }

    public function show(Reunion $reunion)
    {
        abort_if(Gate::denies('reunion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reunion->load('participants');

        return view('admin.reunions.show', compact('reunion'));
    }

    public function destroy(Reunion $reunion)
    {
        abort_if(Gate::denies('reunion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reunion->delete();

        return back();
    }

    public function massDestroy(MassDestroyReunionRequest $request)
    {
        $reunions = Reunion::find(request('ids'));

        foreach ($reunions as $reunion) {
            $reunion->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
