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
    <title>grading</title>
</head>
<body>
    @include('layouts.AdminNavbar')
    @include('layouts.Navbar_admin')

    <div class="container-fluid mt-5" style="width: 60%">
        <h4>Add a new subject to the selected grade</h4>
        <hr>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
         @endif
        @if($errors->any())
            <div class="alert alert-danger">
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            </div>
        @endif
        <form action="addingnewsubject" method="POST">
            @csrf
            <div class="form-group">
                <label >Grade</label>
                <input type="text" class="form-control" name="addGrade"  placeholder="Enter Grade">
            </div>
            <div class="form-group">
                <label >Subject Code</label>
                <input type="text" class="form-control" name="addSubCode" placeholder="Enter Subject Code">
            </div>
            <div class="form-group">
                <label >Subject Name</label>
                <input type="text" class="form-control" name="addSubName" placeholder="Enter Subject Name">
            </div>
            <button style="float: right" type="submit" class="btn btn-primary" name="addingnewsubject">Submit</button>
        </form>
    </div>
    @include('home_page.footer')

</body>