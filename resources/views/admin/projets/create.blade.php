@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.projet.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.projets.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nom">{{ trans('cruds.projet.fields.nom') }}</label>
                <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom', '') }}" required>
                @if($errors->has('nom'))
                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.projet.fields.nom_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.projet.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.projet.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_debut">{{ trans('cruds.projet.fields.date_debut') }}</label>
                <input class="form-control date {{ $errors->has('date_debut') ? 'is-invalid' : '' }}" type="text" name="date_debut" id="date_debut" value="{{ old('date_debut') }}" required>
                @if($errors->has('date_debut'))
                    <span class="text-danger">{{ $errors->first('date_debut') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.projet.fields.date_debut_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_fin">{{ trans('cruds.projet.fields.date_fin') }}</label>
                <input class="form-control date {{ $errors->has('date_fin') ? 'is-invalid' : '' }}" type="text" name="date_fin" id="date_fin" value="{{ old('date_fin') }}">
                @if($errors->has('date_fin'))
                    <span class="text-danger">{{ $errors->first('date_fin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.projet.fields.date_fin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="teams">{{ trans('cruds.projet.fields.team') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('teams') ? 'is-invalid' : '' }}" name="teams[]" id="teams" multiple>
                    @foreach($teams as $id => $team)
                        <option value="{{ $id }}" {{ in_array($id, old('teams', [])) ? 'selected' : '' }}>{{ $team }}</option>
                    @endforeach
                </select>
                @if($errors->has('teams'))
                    <span class="text-danger">{{ $errors->first('teams') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.projet.fields.team_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.projets.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $projet->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection
