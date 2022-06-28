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

    <div class="container-fluid" style="width: 85%">
        <table class="table table-hover mt-5 table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Budhdha Charithaya</th>
                <th scope="col">Pali</th>
                <th scope="col">Abhi Dharmaya</th>
                <th scope="col">Assignment</th>
                <th scope="col">submit grades</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <form action="1stSemUpload" method="post">
                    @csrf
                    <th scope="row">1st term</th>
                    <td><input type="text" name="markBudhdhaCharithaya" class="form-control" placeholder="Enter Marks"></td>
                    <td><input type="text" name="markPali" class="form-control" placeholder="Enter Marks"></td>
                    <td><input type="text" name="markAbhi" class="form-control" placeholder="Enter Marks"></td>
                    <td><input type="text" name="markAssignment" class="form-control" placeholder="Enter Marks"></td>
                    <td scope="col"><button type="submit" name="1stSemUpload" class="btn btn-secondary">submit grades</button></td>
                    <td>{{$semOne}}</td>
                </form>
              </tr>
              <tr>
                <form action="2ndSemUpload" method="post">
                    @csrf
                    <th scope="row">2nd term</th>
                    <td><input type="text" name="markBudhdhaCharithaya" class="form-control" placeholder="Enter Marks"></td>
                    <td><input type="text" name="markPali" class="form-control" placeholder="Enter Marks"></td>
                    <td><input type="text" name="markAbhi" class="form-control" placeholder="Enter Marks"></td>
                    <td><input type="text" name="markAssignment" class="form-control" placeholder="Enter Marks"></td>
                    <td scope="col"><button type="submit" name="2ndSemUpload" class="btn btn-secondary">submit grades</button></td>
                    <td>{{$semTwo}}</td>
                </form>
              </tr>
              <tr>
                <form action="3rdSemUpload" method="post">
                    @csrf
                    <th scope="row">3rd term</th>
                    <td><input type="text" name="markBudhdhaCharithaya" class="form-control" placeholder="Enter Marks"></td>
                    <td><input type="text" name="markPali" class="form-control" placeholder="Enter Marks"></td>
                    <td><input type="text" name="markAbhi" class="form-control" placeholder="Enter Marks"></td>
                    <td><input type="text" name="markAssignment" class="form-control" placeholder="Enter Marks"></td>
                    <td scope="col"><button type="submit" name="3rdSemUpload" class="btn btn-secondary">submit grades</button></td>
                    <td>{{$semThree}}</td>
                </form>
              </tr>
              <tr>
                <form action="selectstu" method="post">
                  @csrf
                  <select class="form-control select2 mt-5" style="width: 50%;" name="stu_name">
  
                    @foreach($students as $student)
                         <option value="{{$student->firstname}}&nbsp;{{$student->lastname}}"><p>{{$student->firstname}} {{$student->lastname}}</p></option>
                    @endforeach
              
                  </select>
                    {{-- <th colspan="5" scope="row">Final</th> --}}
                    <td colspan="7"scope="col">
                        <button type="submit" class="btn btn-secondary">send certificate</button>
                    </td>
                </form>
              </tr>
            </tbody>
          </table>
        @if($errors->any())
            <div class="alert alert-danger">
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            </div>
        @endif
    </div>
    
</body>