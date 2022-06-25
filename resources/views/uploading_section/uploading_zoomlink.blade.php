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
    <title>uploading_zoomlink</title>
</head>

<body>
    @include('layouts.TeacherNavbar')
    <div class="container" style="padding: 10px">
        <div class="card " style="border-color:black">
            <div class="card-body">
              <h2 class="card-title">2022 January 6 / grade {{$gradename->gradeName}} / {{$subjectname->subjectName}}</h2>
            </div>
        </div>
    </div>
   
    <div class="container" style="padding: 10px">
        <div class="card" style="border-color:black; height:400px">
            <div class="card-header" style="border-radius: 0.5rem">
                <h4>upload zoom link</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{url('uploadZoomlink',$day1)}}">
                    @csrf
                    <div class="form-group row">
                      <label for="inputlink3" class="col-sm-2 col-form-label">Zoom link</label>
                      <div class="col-sm-10">
                        <input type="link" name="createzoomlink" class="form-control" id="inputlink3" placeholder="Enter your zoom link here">
                        <br>
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <p>This field is required 'Input url' </p>
                            </div>
                        @endif
                        </div>
                    </div>
                    
                    <div class="form-group row" class="md-form md-outline input-with-post-icon datepicker">
                        <label for="inputlink3" class="col-sm-2 col-form-label">Pick Date</label>
                        <input  type="date" data-date-format="y m d" id="birthdaytime" name="datetime">
                        
                    </div>
                      
                    
                    <div class="form-group row" style="float: right; left: 100px">
                        <button type="button" class="btn btn-light">cancel</button>
                        <button type="submit" name="uploadzoomlink" class="btn btn-primary">save changes</button>
                        
                    </div>
                </form>   
            </div>
        </div>
    </div>
</body>