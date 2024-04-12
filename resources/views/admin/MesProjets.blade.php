@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <a class="btn btn-primary" href="collaboration/projets/create">Créer Projet</a>

            <div class="container"> 
                   
                    <div class="row align-items-start">
                @foreach ($projets as $projet) 
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>{{ $projet->nom }}</strong></h3>
                        </div>
                        <div class="card-image">                        
                           <ul>
                            <li><font color="#000">Description : </font>{{$projet->description}}</li>
                            <li><font color="#000">Date début : </font>{{$projet->date_debut}}</li>
                            <li><font color="#000">Date fin : </font>{{$projet->date_fin}}</li>
                            <li><font color="#000">Participants :</font>
                                @foreach($projet->teams as $key => $item)
                                <span class="badge badge-info">{{ $item->name }}</span>
                            @endforeach
                            </li>
                           </ul>
                        </div>   
                        <div class="card-footer">
                            <a class="btn btn-primary" href="{{ route('projet.taches', ['projet' => $projet->id]) }}">Suivi tâches</a>
                            <a class="btn btn-primary " href="{{ route('admin.taches.create',['projet' => $projet->id]) }}">Ajout tâche</a>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>


            </div>
        </div>
    </div>
</div>



<style>
     

        .card{
            width: 300px;
            border: 2px solid rgb(0, 36, 176);
            border-radius: .25rem;
            margin-bottom: 1rem !important;
            margin-left: 1rem !important;
            margin-right: 1rem !important;
            padding: 20px;
            margin: 20px;
        } 
        
        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .card-title {
            font-size: 20px;
            margin: 0;
        }

        .card-body {
            color: #555;
        }

        .card-footer {
            margin-top: 10px;
            text-align: right;
        }

        .button {
            background-color: #4CAF50;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }
</style>

@endsection
