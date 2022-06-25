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
    @include('layouts.TeacherNavbar')
    @include('uploading_section.Navbar_module')

    <div class="container-fluid" style="width:65%">  
        <div class="card border-info mb-3 mt-5" >
            <div class="card-header">Resault Sheet 2021</div>
                <div class="card-body text-info">
                    <h5 class="card-title">125237A Munasinghe M.H.</h5>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-info">Semester 1</li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Budhdha Charithaya
                        <span class="badge badge-primary badge-pill">{{$sem1->semOneBudhdha}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pali
                        <span class="badge badge-primary badge-pill">{{$sem1->semOnePali}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Abhidharmaya
                        <span class="badge badge-primary badge-pill">{{$sem1->semOneAbhi}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Assignments
                        <span class="badge badge-primary badge-pill">{{$sem1->semOneAssignment}}</span>
                        </li>
                    </ul>
                    <ul class="list-group mt-3">
                        <li class="list-group-item list-group-item-info">Semester 2</li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Budhdha Charithaya
                        <span class="badge badge-primary badge-pill">{{$sem2->semTwoBudhdha}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pali
                        <span class="badge badge-primary badge-pill">{{$sem2->semTwoPali}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Abhidharmaya
                        <span class="badge badge-primary badge-pill">{{$sem2->semTwoAbhi}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Assignments
                        <span class="badge badge-primary badge-pill">{{$sem2->semTwoAssignment}}</span>
                        </li>
                    </ul>
                    <ul class="list-group mt-3">
                        <li class="list-group-item list-group-item-info">Semester 3</li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Budhdha Charithaya
                        <span class="badge badge-primary badge-pill">{{$sem3->semThreeBudhdha}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pali
                        <span class="badge badge-primary badge-pill">{{$sem3->semThreePali}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Abhidharmaya
                        <span class="badge badge-primary badge-pill">{{$sem3->semThreeAbhi}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Assignments
                        <span class="badge badge-primary badge-pill">{{$sem3->semThreeAssignment}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @include('home_page.footer')
</body>