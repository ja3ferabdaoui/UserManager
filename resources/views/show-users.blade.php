<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.jpg') }}">

    <!-- CSFR token for ajax call -->
    <meta name="_token" content="{{ csrf_token() }}"/>

    <title>Manage Users</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- toastr notifications -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Style CSS -->
    <link href="{{ asset('css/style.css') }}" media="all" rel="stylesheet" type="text/css"/>

</head>

<body>
<div class="col-md-8 col-md-offset-2">
    <h2 class="text-center">Manage Users</h2>
    <br/>
    <div class="panel panel-default">
        <div class="panel-heading">
            <ul>
                <li><i class="fa fa-file-text-o"></i> All the current Users</li>
                <a href="#" class="add-modal">
                    <li>Add a User</li>
                </a>
            </ul>
        </div>

        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover" id="userTable">
                <thead>
                <tr>
                    <th valign="middle">ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                </tr>
                {{ csrf_field() }}
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="item{{$user->id}}">
                        <td>{{$user->id}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <button class="edit-modal btn btn-info" data-id="{{$user->id}}"
                                    data-first_name="{{$user->first_name}}" data-last_name="{{$user->last_name}}"
                                    data-email="{{$user->email}}">
                                <span class="glyphicon glyphicon-edit"></span> Edit
                            </button>
                            <button class="delete-modal btn btn-danger" data-id="{{$user->id}}">
                                <span class="glyphicon glyphicon-trash"></span> Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /.panel-body -->
    </div><!-- /.panel panel-default -->
</div><!-- /.col-md-8 -->

<!-- Modal form to add a user -->
@include('create-user')
<!-- Modal form to edit a user -->
@include('edit-user')
<!-- Modal form to delete a user -->
@include('delete-user')

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="  crossorigin="anonymous"></script>

<!-- Bootstrap JavaScript -->
<script type="text/javascript"
        src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

<!-- Toastr notifications -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- AJAX CRUD operations -->
<script src="/js/usersAjax.js"></script>

</body>
</html>