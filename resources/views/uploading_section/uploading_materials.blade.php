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
    <title>uploading materials</title>
</head>
<body>
    @include('layouts.TeacherNavbar')
    @include('uploading_section.Navbar_module')

    <!----------------------upload materials to relevent subject------------------------------>


    <!-- 1st row -->



    <div class="container-fluid" style="width: 85%;">
        <p class="font-weight-light" style="font-size:20px; padding: 20px">grade {{$addGrade}} / {{$addSubject}}</p>
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
        @if(session()->has('errormessage'))
                <div class="alert alert-danger">
                    {{ session()->get('errormessage') }}
                </div>
        @endif
        <form method="post" action="{{url('uploadmaterials')}}" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-12" style="padding-bottom:5px" id="upload_bar">
                <div class="card" style="background-color:#5C5F3A;  ">
                    <div class="card-body" style="color:white; height: 65px">
                        <div class="row">
                            <div class="col-2">
                                <p class="align-baseline">Zoom link for login class</p>                       
                            </div>
                            <div class="col-10">
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                      <input style="opacity: 0.5; " type="link" name="createzoomlink" class="form-control" id="inputlink3" placeholder="Enter your zoom link here">
                                      <br>
                                    </div>
                                </div>      
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <hr>
    
                <!-- 2nd row -->
    
    
            <div class="col-sm-12" style="padding-bottom:5px" id="upload_bar">
                <div class="card" style="background-color:#5C5F3A;  ">
                    <div class="card-body" style="color:white; height: 65px">
                        <div class="row">
                            <div class="col-2">
                                <p class="align-baseline">upload class materials</p>                       
                            </div>
                            <div class="col-10">
                                <div class="mb-3">
                                    <input style="opacity: 0.5" name="createPdf" class="form-control" type="file" id="formFileMultiple" multiple>
                                    <br>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <hr>
          <!-- 3rd row -->
    
    
    
            <div class="col-sm-12" style="padding-bottom:5px" id="upload_bar">
                <div class="card" style="background-color:#5C5F3A;  ">
                    <div class="card-body" style="color:white; height: 65px">
                        <div class="row">
                            <div class="col-2">
                                <p class="align-baseline">upload recorded lecture</p>                       
                            </div>
                            <div class="col-10">
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                      <input style="opacity: 0.5" type="link"  name="createrecord" class="form-control" id="inputlink3" placeholder="Enter recorded lecture recording link">
                                      <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="col-sm-12" style="padding-bottom:5px" id="upload_bar">
                <div class="card" style="background-color:#5C5F3A;  ">
                    <div class="card-body" style="color:white; height: 65px">
                        <div class="row">
                            <div class="col-2">
                                <p class="align-baseline">pick date</p>                       
                            </div>
                            <div class="col-10">
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                      <input style="opacity: 0.5; border-radius: 4px"   type="date" data-date-format="yyyy/mm/dd" id="datepicker" name="datetime">
                                      <br>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row" style="float: right; left: 100px">
                <button type="submit" name="uploadmaterials" class="btn btn-primary">save changes</button>   
            </div>
            
            <!----------------------upload materials to relevent subject------------------------------>
    
        </form>
            

    </div>  
    @include('home_page.footer')
    
</body>
</html>
