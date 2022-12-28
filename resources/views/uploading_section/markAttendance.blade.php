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
    <script type='text/javascript' src='http://code.jquery.com/jquery-1.8.2.js'></script>
    <title>mark Attendance</title>
</head>
<body>
    @include('layouts.TeacherNavbar')
    @include('layouts.Navbar_teacher2')

    <div class="container-fluid mt-5" style="width:65% ;">
        @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
        @endif
        <form method="post" action="{{url('markAtt',[$addSubject])}}">
            @csrf
            <p class="font-weight-light" style="font-size:20px; padding: 20px">grade {{$addGrade}} / {{$addSubject}}</p>
            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <th scope="col">Student Name</th>
                        <th scope="col">Present</th>
                        <th scope="col">Absent</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                            <td>
                                <select class="form-control" id="select_grade" style="width: 50%; background-color:#04a369; color:white;" name="studName">
                                    <option value="0" selected disabled><p>Select Student</p></option>
                                    @foreach ($users as $user)
                                        <option name="customRadioInline1" value={{ $user->firstName }}{{ $user->lastName }}><p>{{ $user->firstName }} {{ $user->lastName }}</p></option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="customRadioInline1"  value="Present" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline1">Present</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="customRadioInline1" value="Absent" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline2">Absent</label>
                                </div>    
                            </td>
                    </tr>
                </tbody>
            </table>
            {{-- <a href="{{url('/show_attendance',[$addGrade,$addSubject])}}"> --}}
                <div class="col mt-4">
                    <button type="submit" name="markAtt" class="btn btn-primary">Submit Attendance</button>
                    <a href="{{url('/showAtt',[$addGrade,$addSubject])}}">
                        <button type="button" class="btn btn-warning">Show Attendance</button>
                    </a>
                </div>
            {{-- </a> --}}
        </form>
    </div>
</body>
