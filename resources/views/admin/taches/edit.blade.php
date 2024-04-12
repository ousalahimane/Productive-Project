@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Modifier Tache
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.taches.update", [$tach->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nom">{{ trans('Nom') }}</label>
                <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom', $tach->nom) }}">
                @if($errors->has('nom'))
                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="projet_id">{{ trans('Projet') }}</label>
                <select class="form-control select2 {{ $errors->has('projet') ? 'is-invalid' : '' }}" name="projet_id" id="projet_id" required>
                    @foreach($projets as $id => $entry)
                        <option value="{{ $id }}" {{ (old('projet_id') ? old('projet_id') : $tach->projet->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('projet'))
                    <span class="text-danger">{{ $errors->first('projet') }}</span>
                @endif
                {{-- <span class="help-block">{{ trans('cruds.tach.fields.projet_helper') }}</span> --}}
            </div>
            <div class="form-group">
                <label for="date_echeance">Date échéance</label>
                <input class="form-control date {{ $errors->has('date_echeance') ? 'is-invalid' : '' }}" type="text" name="date_echeance" id="date_echeance" value="{{ old('date_echeance', $tach->date_echeance) }}">
                @if($errors->has('date_echeance'))
                    <span class="text-danger">{{ $errors->first('date_echeance') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.projet.fields.date_fin_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="etat">{{ trans('Etat') }}</label>
                <input class="form-control {{ $errors->has('etat') ? 'is-invalid' : '' }}" type="text" name="etat" id="etat" value="{{ old('etat', $tach->etat) }}" >
                @if($errors->has('etat'))
                    <span class="text-danger">{{ $errors->first('etat') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.projet.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $tach->description) !!}</textarea>
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
