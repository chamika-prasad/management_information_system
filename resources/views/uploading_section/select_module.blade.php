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
    <title>select_module</title>
</head>

<body>
    @include('layouts.TeacherNavbar')
    @include('uploading_section.Navbar_module')

    <div>
        
    </div>
    <div class="container-fluid form" style="width: 85%;">
        <p class="font-weight-light" style="font-size:20px; padding: 20px">Select Module</p>
        <form action="/submitgradesub" method="POST">
            @csrf
            <div class="col">
              <div class="card" style="background-color:#5C5F3A;  ">
                  <div class="card-body" style="color:white; height: 65px">
                      <div class="row">
                          <div class="col-1"></div>
                          <div class="col-3">
                              <h5 class="align-baseline">select grade</h5>
                          </div>
                          <div class="col-5"></div>
                          
                          <div class="col-3 form-group"  >
                                <select class="form-control" id="select_grade" style="width: 50%; background-color:#04a369; color:white;" name="stu_name1">
                                    <option value="0" selected disabled><p>select garade</p></option>
                                    @foreach($grades as $grade)
                                        <option value={{ $grade->subGrade }}><p>Grade {{ $grade->subGrade }} </p></option>
                                    @endforeach
                                </select>
                            </div><!-- Close Content Div of Page12 -->
                        </div>
                          
                    </div>
                </div>
            </div>
      
            <hr>

      
            <div class="col" >
                <div class="card" style="background-color:#5C5F3A;  ">
                    <div class="card-body" style="color:white; height: 65px">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-3">
                                <h5 class="align-baseline">select subject</h5>
                            </div>
                            <div class="col-5"></div>
                            
                            <div class="col-3 form-group" id="subject" >
                                <select 
                                    id='form-control-1' 
                                    class="form-control-1" 
                                    style="
                                        width: 50%; 
                                        background-color:#04a369; 
                                        color:white;
                                        height: 35px;
                                        background-clip: padding-box;
                                        border: 1px solid  #ced4da;
                                        border-radius:0.25rem;
                                        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;" 
                                    name="stu_name2"
                                >
                                    <option value="0" selected disabled><p>select subject</p></option>
                                </select>
                            </div><!-- Close Content Div of Page12 -->
                        </div>  
                     
                    </div>
                </div>
            </div>
            <div class="col mt-4">
                <button class="btn btn-danger" type="submit" name="submitgradesub" style="font-size: 1.5rem; float:right; ">continue</button>
            </div>
        </form>
        <hr>
        
    </div>
    <div>
        @include('home_page.footer')
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('change','.form-control',function(){
                // console.log("hmm its change");

                var grade_id =$(this).val();

                var div =$(this).parent();

                var op=" ";
                $.ajax({
                    type: 'get',
                    url:'{!!URL::to('findGrade')!!}',
                    data:{'subGrade':grade_id},
                    success:function(data){
                        // console.log("success");

                         console.log(data);
                        // console.log(data.length);
                        var select =document.getElementById('form-control-1')
                        select.innerHTML=' '
                        for(var i=0;i<data.length;i++)
                        {
                            op= '<option value="'+data[i].subjectName+'">'+data[i].subjectName+'</option>';
                            select.innerHTML += op;
                        //console.log(data[i].subjectName);
                          console.log(op);
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

</html>