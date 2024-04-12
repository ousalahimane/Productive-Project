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
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<link href="css/comment.css" rel="stylesheet">

  </head>
  <body>

	<br>
	<div class="container ">
	  <div class="row align-items-start">
		<div class="col-md-4">
			<div class="card border-danger">
			  <div class="card-body">
				<h5 class="card-title">Nouvelles tâches <a href="admin/taches/create"><i class="fas fa-marker"></i></a></h5>
				<h6 class="card-subtitle mb-2 text-body-secondary">   <br>    </h6>
				<!--contenu de liste (Nouvelles tâches) -->
				@foreach($taches as $tach )
					<div class="card mb-2">		          
						<div class="card-header">
							<h3 class="card-title">{{ $tach->titre }}</h3>
							<div class="card-actions">
								<button class="card-menu">
									<span class="dot"></span>
									<span class="dot"></span>
									<span class="dot"></span>
								</button>
								<div class="card-menu-dropdown">	
									<li><a class="dropdown-item" href="admin/taches/{{ $tach->id }}"><i class="fas fa-eye"></i>Afficher</a></li>								
									<li><a class="dropdown-item" href="admin/taches/{{ $tach->id }}/edit"><i class="fas fa-edit"></i>Modifier</a></li>
									<li><a class="dropdown-item" href="/commentaire"><i class="fas fa-comment"></i>Commenter</a></li>
								</div>
							</div>
							<p class="card-text">
								@if($tach->etat == 'Nouveau')
									<p>ID : {{ $tach->id }}</p>
									<p> {{ $tach->description }}</p>  
								@endif
							</p>		
						</div>																											 
					</div>
					@endforeach
					
				<!---->
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card border-warning">
			  <div class="card-body">
				<h5 class="card-title">Tâches en cours<a href="admin/taches/create"><i class="fas fa-marker"></i></a> </h5>
				<h6 class="card-subtitle mb-2 text-body-secondary">  <br> </h6>
				<!--contenu de liste en cours de traitement -->
				@foreach($taches as $tach)
					<div class="card mb-2">
						<div class="card-header">
							<h3 class="card-title">{{ $tach->titre }}</h3>
							<div class="card-actions">
							  <button class="card-menu">
								<span class="dot"></span>
								<span class="dot"></span>
								<span class="dot"></span>
							  </button>
							  <div class="card-menu-dropdown">
								    <li><a class="dropdown-item" href="admin/taches/{{ $tach->id }}"><i class="fas fa-eye"></i>Afficher</a></li>								
									<li><a class="dropdown-item" href="admin/taches/{{ $tach->id }}/edit"><i class="fas fa-edit"></i>Modifier</a></li>
									<li><a class="dropdown-item" href="/commentaire"><i class="fas fa-comment"></i>Commenter</a></li>
								</div>
							</div>
						  </div>

					  
						<h5 class="card-title"></h5>
						<p class="card-text"> 
							
                            @if($tach->etat == 'En cours de traitement')
                                <p>ID : {{ $tach->id }}</p>
                               <p> {{ $tach->description }}</p> 
                            @endif
							
                        </p>
					  
					 
					</div>
					@endforeach

					
				<!---->
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card border-success">
			  	<div class="card-body">
					<h5 class="card-title">Tâches terminés<a href="admin/taches/create"><i class="fas fa-marker"></i></a></h5>
					<h6 class="card-subtitle mb-2 text-body-secondary"> <br> </h6>
					<!--contenu de liste (Tâches terminés) -->
					@foreach($taches as $tach)
						<div class="card mb-2">		
							<div class="card-header">
								<h3 class="card-title">{{ $tach->titre }}</h3>
								<div class="card-actions">
								<button class="card-menu">
									<span class="dot"></span>
									<span class="dot"></span>
									<span class="dot"></span>
								</button>
								<div class="card-menu-dropdown">
									<li><a class="dropdown-item" href="admin/taches/{{ $tach->id }}"><i class="fas fa-eye"></i>Afficher</a></li>								
									<li><a class="dropdown-item" href="admin/taches/{{ $tach->id }}/edit"><i class="fas fa-edit"></i>Modifier</a></li>
									<li><a class="dropdown-item" href="/commentaire"><i class="fas fa-comment"></i>Commenter</a></li>
								</div>
								</div>
							</div>
							<p class="card-text">
								@if($tach->etat == 'Terminé')
									<p>ID : {{ $tach->id }}</p>
									<p> {{ $tach->description }}</p> 
								@endif
							</p>
						</div>
					@endforeach	
				</div>
	  		</div>
		</div>
 




	
  
	<style>

body {
  font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
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
