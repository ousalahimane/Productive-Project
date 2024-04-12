{{-- {{ $projet->id }}
{{ $projet->nom }}
{!! $projet->description !!}
{{ $projet->date_debut }}
{{ $projet->date_fin }}
{{ $projet->type->type ?? '' }}
@foreach($projet->teams as $key => $team)
<span class="label label-info">{{ $team->name }}</span>
@endforeach
@foreach($projet->projetTaches as $key => $tach)
<ul>
    <li>{{ $tach->id ?? '' }}</li>
    <li>{{ $tach->projet->nom ?? '' }}</li>
    <li>{{ $tach->nom ?? '' }}</li>
</ul>
<p>-----------</p>
@endforeach --}}

{{-- @includeIf('admin.projets.relationships.projetTaches', ['taches' => $projet->projetTaches]) --}}
{{-- @foreach($taches as $key => $tach) --}}


@extends('layouts.admin')
@section('content')


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tableau de bord</title>


    <!-- Inclure les bibliothèques nécessaires -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <!-- Custom styles for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/comment.css" rel="stylesheet">

</head>

<body>

    
    
           <h1>{{ $projet->nom }}</h1>
        
    {{-- {!! $projet->description !!} --}}
    <div class="container ">
        <div class="row align-items-start">
            <div class="col-md-4">
                <div class="card border-danger">
                    <div class="card-body">
                        <h5 class="card-title">Nouvelles tâches</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                        <!--contenu de liste (Tâches terminés) -->
                        <br>
						<table>
                        @foreach($projet->projetTaches as $key => $tach)
                        @if($tach->etat == 'Nouveau')
                        
						<tr>
							<td>{{ $tach->nom ?? '' }}</td>
                            
							<td><a class="dropdown-item" href="{{ url('/tache/'.$tach->id.'/commentaire') }}"><i class="fa fa-comment"></i></a></td>
						</tr>
                        @endif
                        @endforeach
						</table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-warning">
                    <div class="card-body">
                        <h5 class="card-title">Tâches en cours</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary"> <br> </h6>
                        

                        <table>
                        @foreach($projet->projetTaches as $key => $tach)
                        @if($tach->etat == 'En cours de traitement')
                       
                        <tr>
							<td>{{ $tach->nom ?? '' }}</td>
							<td><a class="dropdown-item" href="{{ url('/tache/'.$tach->id.'/commentaire') }}"><i class="fa fa-comment"></i></a></td>
						</tr>

                        @endif
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
			<div class="col-md-4">
				<div class="card border-success">
					<div class="card-body">
						<h5 class="card-title">Tâches terminés</h5>
						<h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                         
                        <br>
                        <table>
						@foreach($projet->projetTaches as $key => $tach)
						@if($tach->etat == 'Terminé')
						
                        <tr>
							<td>{{ $tach->nom ?? '' }}</td>
							<td><a class="dropdown-item" href="{{ url('/tache/'.$tach->id.'/commentaire') }}"><i class="fa fa-comment"></i></a></td>
						</tr>
                          
						@endif
						@endforeach
                        </table>
					</div>
				</div>
			</div>
        </div>
    </div>
    {{-- 
		<h2>Nouveau</h2>
		@foreach($projet->projetTaches as $key => $tach)
			@if($tach->etat == 'Nouveau')
			<ul>
				<li>{{ $tach->nom ?? '' }}</li>
    </ul>
    @endif
    @endforeach
    <p>---------------------</p>
    <h2>en cours</h2>
    @foreach($projet->projetTaches as $key => $tach)
    @if($tach->etat == 'en cours')
    <ul>
        <li>{{ $tach->nom ?? '' }}</li>
    </ul>
    @endif
    @endforeach
    <p>---------------------</p>
    <h2>terminer</h2>
    @foreach($projet->projetTaches as $key => $tach)
    @if($tach->etat == 'terminer')
    <ul>
        <li>{{ $tach->nom ?? '' }}</li>
    </ul>
    @endif
    @endforeach

    --}}


    <style>
        body {
            font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #00376f;
            text-align: left;
        }

        .card {
            border: 2px solid #ccc;
            border-radius: 27px;
            border-top-color: rgb(231, 231, 231);
            border-right-color: rgb(224, 224, 224);
            border-bottom-color: rgb(242, 242, 242);
            border-left-color: rgb(219, 217, 217);
            padding: 10px;
            margin-bottom: 10px;
        }


        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 10px;
        }

        .card-title {
            margin: 0;
        }

        .card-actions {
            position: relative;
        }

        .card-menu {
            background: none;
            border: none;
            cursor: pointer;
        }

        .dot {
            width: 5px;
            height: 5px;
            background-color: #000;
            border-radius: 50%;
            display: block;
            margin: 2px;
        }

        .card-menu-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px 0;
            list-style: none;
            display: none;
            z-index: 100;
            width: fit-content;
        }

        .card-menu-dropdown li {
            padding: 5px 10px;
        }

        .card-menu-dropdown li:hover {
            background-color: #f5f5f5;
        }

        .card-actions:hover .card-menu-dropdown {
            display: block;
        }

    </style>
</body>

</html>
@endsection