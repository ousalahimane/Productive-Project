@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tach.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
           
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tach.fields.id') }}
                        </th>
                        <td>
                            {{ $tach->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('Nom') }}
                        </th>
                        <td>
                            {{ $tach->nom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('Projet') }}
                        </th>
                        <td>
                            {{ $tach->projet->nom ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Date d'échéance
                        </th>
                        <td>
                            {{ $tach->date_echeance ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('Etat') }}
                        </th>
                        <td>
                        {{ $tach->etat}}

                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projet.fields.description') }}
                        </th>
                        <td>
                            {!! $tach->description !!}
                        </td>
                    </tr>
 
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.taches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection