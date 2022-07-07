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
    <title>grading</title>
</head>
<body>
    @include('layouts.TeacherNavbar')
    @include('layouts.Navbar_module')

    <div class="container-fluid" style="width: 85%">
        <table class="table table-hover mt-5 table-responsive-sm">
          <form action="selectstu" method="post">
            @csrf
            <tbody>
              <tr id="form-control-1"></tr>
              <tr id="form-control-2"></tr>
              <tr id="form-control-3"></tr>
            </div>
            {{-- <th colspan="5" scope="row">Final</th> --}}
            <div style="float: right">
              <td colspan="3"scope="col">
                <button type="submit"  name="selectstu" class="btn btn-secondary">Submit Grades</button>
            `</td>
              <td colspan="1"scope="col">
                <button type="button" class="btn btn-secondary">send certificate</button>
              </td>
            </div>
              <tr>
                  <div class="d-flex align-items-start">
                    <select class="form-control select2 mt-5 ml-5 mr-3" id="select_grade" style="width: 40%;" name="grd_name">
    
                      @foreach($stu_grades as $stu_grade)
                          <option value="{{$stu_grade->subGrade}}"><p>grade {{$stu_grade->subGrade}}</p></option>
                      @endforeach
                
                    </select>
                    {{-- <select class="form-control-1 select2 mt-5 mr-3" id="subject" style="width: 50%;" >
    
                      <option value="0" selected disabled><p>select subject</p></option>
                
                    </select> --}}

                    </p>
                    <select class="form-control-2 select2 mt-5" 
                      style="display: block;
                            width: 100%;
                            padding: 0.375rem 0.75rem;
                            font-size: 1rem;
                            line-height: 1.5;
                            color: #495057;
                            background-color: #fff;
                            background-clip: padding-box;
                            border: 1px solid #ced4da;
                            border-radius: 0.25rem;
                            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;" 
                      name="stu_name"
                    >
    
                      @foreach($students as $student)
                          <option value="{{$student->firstname}}&nbsp;{{$student->lastname}}"><p>{{$student->firstname}} {{$student->lastname}}</p></option>
                      @endforeach
                
                    </select>
                </tr>
              </tbody>
            </form>
          </table>
        @if($errors->any())
            <div class="alert alert-danger">
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            </div>
        @endif
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
          $(document).on('change','.form-control',function(){
              console.log("hmm its change");

              var grade_id =$(this).val();
              console.log(grade_id);

              var div =$(this).parent();

              var op=" ";
              var om=" ";

              $.ajax({
                  type: 'get',
                  url:'{!!URL::to('findGrade')!!}',
                  data:{'subGrade':grade_id},
                  success:function(data){
                      // console.log("success");

                      // console.log(data);
                      // console.log(data.length);
                      // var select =document.getElementById('form-control-1');
                      // select.innerHTML=' '

                      // var select1 =document.getElementById('form-control-2');
                      // select1.innerHTML=' '
                      for(var i=0;i<data.length;i++)
                      {
                        // if(i==0)
                        // {
                        //   op = '<p>'+data[0].subjectName+'<p><input name="sem1" type="text" class="form-control-text ml-2" id="sem1"><input name="sem2" type="text" class="ml-2" id="sem2"><input name="sem3" type="text" class="ml-2" id="sem3">';
                        //   select.innerHTML += op;
                        // }
                        // elseif(i==1)
                        // {
                          
                          document.getElementById('form-control-1').innerHTML = '<p name="subName1">'+data[0].subjectName+'</p><input name="sem1a" type="text" class="form-control-text ml-2" id="sem1"><input name="sem1b" type="text" class="ml-2" id="sem2"><input name="sem1c" type="text" class="ml-2" id="sem3">';
                          document.getElementById('form-control-2').innerHTML = '<p name="subName2">'+data[1].subjectName+'</p><input name="sem2a" type="text" class="form-control-text ml-2" id="sem1"><input name="sem2b" type="text" class="ml-2" id="sem2"><input name="sem2c" type="text" class="ml-2" id="sem3">';
                          document.getElementById('form-control-3').innerHTML = '<p name="subName3">'+data[2].subjectName+'</p><input name="sem3a" type="text" class="form-control-text ml-2" id="sem1"><input name="sem3b" type="text" class="ml-2" id="sem2"><input name="sem3c" type="text" class="ml-2" id="sem3">';
                          // select1.innerHTML += om;
                        // } 
                      }
                  },
                  error:function(){
                      console.log("failed");
                  }
              });
          });
      });
  </script>
    
</body>