@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reunion.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reunions.update", [$reunion->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="titre">{{ trans('cruds.reunion.fields.titre') }}</label>
                <input class="form-control {{ $errors->has('titre') ? 'is-invalid' : '' }}" type="text" name="titre" id="titre" value="{{ old('titre', $reunion->titre) }}" required>
                @if($errors->has('titre'))
                    <span class="text-danger">{{ $errors->first('titre') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reunion.fields.titre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.reunion.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $reunion->date) }}" required>
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reunion.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="time">{{ trans('cruds.reunion.fields.time') }}</label>
                <input class="form-control timepicker {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text" name="time" id="time" value="{{ old('time', $reunion->time) }}" required>
                @if($errors->has('time'))
                    <span class="text-danger">{{ $errors->first('time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reunion.fields.time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="participants">{{ trans('cruds.reunion.fields.participants') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('participants') ? 'is-invalid' : '' }}" name="participants[]" id="participants" multiple required>
                    @foreach($participants as $id => $participant)
                        <option value="{{ $id }}" {{ (in_array($id, old('participants', [])) || $reunion->participants->contains($id)) ? 'selected' : '' }}>{{ $participant }}</option>
                    @endforeach
                </select>
                @if($errors->has('participants'))
                    <span class="text-danger">{{ $errors->first('participants') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reunion.fields.participants_helper') }}</span>
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