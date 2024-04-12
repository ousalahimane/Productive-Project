@extends('layouts.admin')
@section('content')


<h2>Commentaire</h2>
<ul>
    @foreach($tache->tachecommentaires as $key => $tach)
        <li>{{ $tach->contenu ?? '' }}</li>
    @endforeach
</ul>

@endsection