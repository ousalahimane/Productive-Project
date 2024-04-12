@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Taches
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.taches.store") }}" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="nom">{{ trans('Nom') }}</label>
                <input class="form-control ckeditor {{ $errors->has('nom') ? 'is-invalid' : '' }}" name="nom" id="nom" value="{!! old('nom') !!}">
                @if($errors->has('nom'))
                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="projet_id">{{ trans('Projet') }}</label>
                <select class="form-control select2 {{ $errors->has('projet') ? 'is-invalid' : '' }}" name="projet_id" id="projet_id" required>
                    @foreach($projets as $id => $entry)
                        <option value="{{ $id }}" {{ old('projet_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('projet'))
                    <span class="text-danger">{{ $errors->first('projet') }}</span>
                @endif
                {{-- <span class="help-block">{{ trans('cruds.tach.fields.projet_helper') }}</span> --}}
            </div>
            <div class="form-group">
                <label for="date_echeance">Date d'échéance </label>
                <input class="form-control date {{ $errors->has('date_echeance') ? 'is-invalid' : '' }}" type="text" name="date_echeance" id="date_echeance" value="{{ old('date_echeance') }}">
                @if($errors->has('date_echeance'))
                    <span class="text-danger">{{ $errors->first('date_echeance') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.projet.fields.date_fin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="etat">{{ trans('Etat') }}</label>
                <select class="form-control {{ $errors->has('etat') ? 'is-invalid' : '' }}" name="etat" id="etat">
                    <option value="">Sélectionnez un état</option>
                    <option value="Nouveau" {{ old('etat') == 'Nouveau' ? 'selected' : '' }}>Nouveau</option>
                    <option value="En cours de traitement" {{ old('etat') == 'En cours de traitement' ? 'selected' : '' }}>En cours de traitement</option>
                    <option value="Terminé" {{ old('etat') == 'Terminé' ? 'selected' : '' }}>Terminé</option>
                    <!-- Ajoutez plus d'options ici si nécessaire -->
                </select>
                @if($errors->has('etat'))
                    <span class="text-danger">{{ $errors->first('etat') }}</span>
                @endif
                {{-- <span class="help-block">{{ trans('cruds.tach.fields.etat_helper') }}</span> --}}
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.projet.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.projet.fields.description_helper') }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
