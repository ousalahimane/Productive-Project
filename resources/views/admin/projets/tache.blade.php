@extends('layouts.admin')
@section('content')

  <style>
    .taskboard .dd-item .dd-handle {
        border: 0;
        padding: 4px 15px;
        margin: 0;
        height: inherit;
        background-color: #a08cff;
        }
    
    .taskboard .dd-item {
        border: 1px solid #a08cff;
       }

       .card{
            border: 2px solid rgb(0, 36, 176);
            border-radius: .25rem;
            margin-bottom: 1rem !important;
            margin-left: 1rem !important;
            margin-right: 1rem !important;
        } 
        
      
  </style>


<body class="theme-indigo">
    <div class="card">
        <h3 align="center"> {{ $projet->nom }}
        </h3> <br> <br>
                   
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 d-flex">
                        <div class="card flex-fill">                           
                            <div class="header">
                                <h2><strong><font color="blue">Nouvelles tâches</font></strong></h2>
                            </div>
                            <div class="body taskboard planned_task">
                                <div class="dd" data-plugin="nestable">
                                    <ol class="dd-list">
                                    @foreach($projet->projetTaches as $key => $tach)
                                           @if($tach->etat == 'Nouveau')
            
                                        <li class="dd-item" data-id="1">
                                            <div class="dd-handle d-flex justify-content-between align-items-center">
                                                <div class="h6 mb-0">{{ $tach->nom }}</div>
                                                <div class="action">
                                                    <a href="{{url('/collaboration/taches/'.$tach->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                                                    <a href="{{url('/collaboration/taches/'.$tach->id)}}"><i class="fas fa-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="dd-content p-15">
                                                <p class="card-text">{{ $tach->description ?? '' }}</p>  
                                                <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                    <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="fa fa-time"></i>état</span></li>
                                                    <li class="ml-3 bd-highlight"><a href="{{ url('/tache/'.$tach->id.'/commentaire') }}" class="text-muted"><i class="fa fa-comments"></i></a></li>
                                                    {{-- <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="fa fa-check-square"></i> 11</a></li> --}}                 
                                                </ul>
                                            </div>
                                        </li>

                                    @endif
                                    @endforeach  
                                    </ol>
                                </div>
                                {{-- <button data-toggle="modal" data-target="#addcontact" type="button" class="btn btn-primary btn-block btn-animated btn-animated-y">
                                    <span class="btn-inner--visible">Add New</span>
                                    <span class="btn-inner--hidden"><i class="fa fa-plus"></i></span>
                                </button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 d-flex">
                        <div class="card flex-fill">
                            <div class="header">
                                <h2><strong><font color="blue">Tâches en cours</font></strong></h2>
                            </div>
                            <div class="body taskboard progress_task">
                                <div class="dd" data-plugin="nestable">
                                    <ol class="dd-list">
                                        @foreach($projet->projetTaches as $key => $tach)
                                           @if($tach->etat == 'En cours de traitement')
                                        <li class="dd-item" data-id="2">
                                            <div class="dd-handle d-flex justify-content-between align-items-center">
                                                <div class="h6 mb-0">{{ $tach->nom }}</div>
                                                <div class="action">
                                                    <a href="{{url('/collaboration/taches/'.$tach->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                                                    <a href="{{url('/collaboration/taches/'.$tach->id)}}"><i class="fas fa-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="dd-content p-15">
                                                <p class="card-text">{{ $tach->description ?? '' }}</p>   
                                                <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                    <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="fa fa-time"></i>état</span></li>
                                                    <li class="ml-3 bd-highlight"><a href="{{ url('/tache/'.$tach->id.'/commentaire') }}" class="text-muted"><i class="fa fa-comments"></i></a></li>
                                                    {{-- <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="fa fa-check-square"></i> 8</a></li> --}}
                                                </ul>
                                            </div>
                                        </li>
                                        @endif
                                        @endforeach 
                                    </ol>
                                </div>
                                {{-- <button data-toggle="modal" data-target="#addcontact" type="button" class="btn btn-primary btn-block btn-animated btn-animated-y">
                                    <span class="btn-inner--visible">Add New</span>
                                    <span class="btn-inner--hidden"><i class="fa fa-plus"></i></span>
                                </button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 d-flex">
                        <div class="card flex-fill">
                            <div class="header">
                                <h2><strong><font color="blue">Tâches terminés</font></strong></h2>                            
                            </div>
                            <div class="body taskboard completed_task">
                                <div class="dd" data-plugin="nestable">
                                    <ol class="dd-list">
                                        @foreach($projet->projetTaches as $key => $tach)
                                          @if($tach->etat == 'Terminé')
                                        <li class="dd-item" data-id="1">
                                            <div class="dd-handle d-flex justify-content-between align-items-center">
                                                <div class="h6 mb-0">{{ $tach->nom }}</div>
                                                <div class="action">
                                                    <a href="{{url('/collaboration/taches/'.$tach->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                                                    <a href="{{url('/collaboration/taches/'.$tach->id)}}"><i class="fas fa-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="dd-content p-15">
                                                <p class="card-text">{{ $tach->description ?? '' }}</p>
                                                <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                    <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="fa fa-time"></i>état</span></li>
                                                    <li class="ml-3 bd-highlight"><a href="{{ url('/tache/'.$tach->id.'/commentaire') }}" class="text-muted"><i class="fa fa-comments"></i></a></li>
                                                    {{-- <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="fa fa-check-square"></i> 11</a></li> --}}                          
                                                </ul>
                                            </div>
                                        </li>
                                        @endif
                                        @endforeach 
                                    </ol>
                                </div>
                                {{-- <button data-toggle="modal" data-target="#addcontact" type="button" class="btn btn-primary btn-block btn-animated btn-animated-y">
                                    <span class="btn-inner--visible">Add New</span>
                                    <span class="btn-inner--hidden"><i class="fa fa-plus"></i></span>
                                </button> --}}
                            </div>
                        </div>
                    </div>
                </div>
    </div>    
 

<!-- Core -->

<script src="{{ asset('../assets2/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('../assets2/bundles/vendorscripts.bundle.js') }}"></script>

<script src="{{ asset('../assets2/vendor/nestable/jquery.nestable.js') }}"></script> <!-- Jquery Nestable -->

<!-- Theme JS -->
<script src="{{ asset('../assets2/js/theme.js') }}"></script>
<script src="{{ asset('../assets2/js/pages/sortable-nestable.js') }}"></script>
</body>

@endsection

