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
    <title>select_module</title>
</head>

<body>
    @include('layouts.TeacherNavbar')
    @include('exam_section.Navbar_module')

    <div>
        
    </div>
    <div class="container-fluid form" style="width: 85%;">
        <p class="font-weight-light" style="font-size:20px; padding: 20px">Select Module</p>
        <form action="{{url('/teacher_show_exam_list')}}" method="POST">
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
                                  <select class="btn btn-danger"  name="selectGrade" id="City">
                                      <div>
                                          <option value="">Select grade...</option>
                                          <option value="1">grade 1</option>
                                          <option value="2">grade 2</option>
                                          <option value="3">grade 3</option>
                                          <option value="4">grade 4</option>
                                          <option value="5">grade 5</option>
                                          <option value="6">grade 6</option>
                                          <option value="7">grade 7</option>
                                          <option value="8">grade 8</option>
                                          <option value="9">grade 9</option>
                                          <option value="10">grade 10</option>
                                          <option value="11">grade 11</option>
                                      </div>
                                      
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
                                  <select class="btn btn-danger"  name="selectSubject" >
                                      <div>
                                          <option value="">Select subject...</option>
                                          <option value="Budhdha Charithaya">Budhdha Charithaya</option>
                                          <option value="Pali">Pali</option>
                                          <option value="Abhi Dharmaya">Abhi Dharmaya</option>
                                      </div>
                                      
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




</body>

</html>