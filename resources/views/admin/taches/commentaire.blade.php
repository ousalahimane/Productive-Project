@extends('layouts.admin')
@section('content')


<form action="{{ url('tache/commentaire') }}" method="post">
    @csrf
    <label for="nom">Commentaire</label>
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <input type="hidden" name="tache_id" value="{{ $tache->id }}">
    <textarea class="form-control ckeditor" type="text" name="contenu" id="contenu" required> </textarea><br>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">
           Ajouter commentaire
        </button>
    </div>
</form>

<label>Les commentaires</label>


    
       <ol>
    <div class="row">
        <div class="col-lg-12">
            <div class="list-group">
                @foreach($tache->tachecommentaires as $key => $tach)
                    @if($tach->contenu != null)     
                    <li>{{ $tach->contenu ?? '' }}</li>
                    @else
                    <strong>Vous n'avez pas de commentaires. </strong>
                    @endif
                @endforeach

        </ol>
    
        </div>
    </div>
    </div>

@endsection