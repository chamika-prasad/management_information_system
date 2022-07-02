<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Free_Learning_Application</title>
</head>
<style>

    input[type=email], input[type=password] {
   width: 100%;
   font-size: 15px;
   padding: 15px;
   margin: 5px 0 22px 0;
   display: inline-block;
   border: none;
   background: #f1f1f1;
}
label{
   font-size: 15px;
}
input[type=email]:focus, input[type=password]:focus {
   background-color: #ddd;
   outline: none;
}
.container {
   padding: 16px;
}
.card{
    border-style: dotted;
  border-width: 2px;
  border-color:black;
}
    </style>
<body>
<nav class="navbar navbar-light " style="background-color: #FDEFEF;">
            <div class="left-corner">
                <img src="./images/menu.png" width="35" height="35">
                <span class="navbar-brand mb-0 h1" style="font-weight: bold;">Welcome To The E-Learning of Dhamma school</span>
            </div>
</nav>
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
<div class="container" style="height:auto;min-height: 100vh">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card text-body bg-info mb-3 mt-2">
            <div class="card-header font-weight-bold text-white">
                <h2><b>Registered Users</b></h2>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>
                                            <div class="card">
                                            <div class="card-body">
                                                <div class="row note note-info">
                                                    <div class="col-lg-7">
                                                        <h5 class="card-title">{{ $item->firstName }}{{ $item->lastName }} (User ID : {{$item->id}})</h5>
                                                    </div>
                                                    <div class="col-lg-5 d-flex justify-content-end">
                                                     
                                                        <a href="{{ url('role-edit/'.$item->id) }}" class="btn btn-primary mx-2">EDIT</a>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <br>
                                                        <p class="card-text"><b>Contact Number : </b>{{ $item->mobileNumber }}</p>
                                                        <p class="card-text"><b>Email : </b>{{ $item->email }}</p>
                                                        <p class="card-text"><b>Role : </b>{{ $item->usertype }}</p>
                                                       
                                                            <form action="{{ url('role-delete/'.$item->id) }}" method="post">
                                                            {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                  
                                                                <button type="submit" class="btn btn-danger">DELETE</button>
                                                            </form>
                                                     

                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
</main>
@include('home_page.footer')


</body>
</html>