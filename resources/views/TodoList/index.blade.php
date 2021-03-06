@extends('layouts.app')

@push('head')

    <meta name="csrf-token" content="{{ csrf_token() }}" />

@endpush


@section('content')

<div id="left_menu" class="left_menu">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css') }}" >
    <h2> Liste de vos Todolist: </h2>
    <tbody>
            <div id="list_todolist">
            </div>
    <div id="bouton_create">
        <i class="material-icons" id="btn-create" onclick="window.location.href='/Todolist/create'" id="icon_notif">add</i>
    </div></br></br>
            <hr>
    <h2> Liste des Todolists Partagées avec vous : </h2>
    <div id="list_sharedtodolist">
            </div>
    </tbody>
</div>

<div id="todolist" >
    <div id="Administration_Todolist">
        <span id ="Titre_todolist"></span>
        <i id="Delete_Todo"><i class="material-icons"  id="btn-task" id="icon_notif">delete</i></i>
        <i id="Partager_todo"><i class="material-icons"  id="btn-task" id="icon-notif">share</i></i>
        <i id="Rename_Todo"><i class="material-icons"  id="btn-task" id="icon_notif">edit</i></i>
        <div id="Changer_nom_user" >
            <form id="Changernametodolist"  class="Name_Todolist"  method = "post">
                <input id ="Id_todolist_changer" name="id_todolist" type="hidden">
                <input  id="Changer_nom_todolist" maxlength="37" class="form-control" name="name_todolist" >
            </form>
            <button id="Changer_nom" class="btn btn-success bouton-creation">Valider</button>
        </div>
    </div>

    <div id="partage">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                        <span id="Nom_sharetodolist">Partager votre Todolist</span>
                            <i id="Close_Partage"><i class="material-icons" id="btn-task" id="icon_notif">close</i></i>
                            </div>
                                <form id="Share_Todolist" action="{{ route('Sharedtodolist.store') }}" method="post">
                                    @csrf
                                    <div class="dropdown">
                                        <p class="text-todolist_share_window">Selectionnez un ami et une permission à lui attribuer.</p>

                                            <input id="input_share_id" name="id" type="hidden">

                                            <input id="input_share_todolist_id" name="todolist_id" type="hidden">

                                        <div id="div_form_share">

                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Vos amis
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="menu_amis_list"> </div>

                                                <p id="input_share_name" type="hidden"></p>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline1" name="permissions" value="read" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadioInline1">Lecture</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline2" name="permissions" value="write" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadioInline2">Ecriture</label>
                                            </div>

                                        </div>

                                        <div id="Valider_partage" >
                                        <input type="submit" value="Partager" class="btn btn-success bouton-creation">
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="todo_container">
            <div id="create_task" class="task_todo">
            </div>
            <div id="tasks_inprogress">
            <span id="task_title">Taches en cours  </span>
            </div>
            <div id="tasks_finished">
            </div>
        </div>
</div>

@endsection

<!-- JQuery et Ajax-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<!-- Scripts ajax -->
<script>
    var id_todolist_selected_acceuil = '{{$id_todolist_select_acceuil}}' ;
</script>
<script type="text/javascript" src="{{ URL::asset('js/Selectedtodolist.js') }}"></script>
