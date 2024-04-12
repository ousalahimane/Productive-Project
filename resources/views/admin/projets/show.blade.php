@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.projet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.projets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.projet.fields.id') }}
                        </th>
                        <td>
                            {{ $projet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projet.fields.nom') }}
                        </th>
                        <td>
                            {{ $projet->nom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projet.fields.description') }}
                        </th>
                        <td>
                            {!! $projet->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projet.fields.date_debut') }}
                        </th>
                        <td>
                            {{ $projet->date_debut }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projet.fields.date_fin') }}
                        </th>
                        <td>
                            {{ $projet->date_fin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projet.fields.team') }}
                        </th>
                        <td>
                            @foreach($projet->teams as $key => $team)
                                <span class="label label-info">{{ $team->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.projets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#projet_taches" role="tab" data-toggle="tab">
                {{ trans('cruds.tach.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="projet_taches">
            @includeIf('admin.projets.relationships.projetTaches', ['taches' => $projet->projetTaches])
        </div>
    </div>
</div>

@endsection
