@extends('layout')

@section('content')

 <main class="login-form">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-md-8">
               <div class="card">
                   <div class="card-header">Register</div>
                    <div class="card-body">
                        <form action="{{route('register.post')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-lable text-md-right">Name</label>
                                 <div class="col-md-6">
                                     <input type="text" name="name" id="name" class="form-control" required autofocus>
                                      @if($errors->has('name'))
                                       <span class="text-danger">{{$errors->first('name')}}</span>
                                       @endif
                                 </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-lable text-md-right">Email</label>
                                 <div class="col-md-6">
                                     <input type="email" name="email" id="email" class="form-control" required autofocus>
                                      @if($errors->has('email'))
                                       <span class="text-danger">{{$errors->first('email')}}</span>
                                       @endif
                                 </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-lable text-md-right">Password</label>
                                 <div class="col-md-6">
                                     <input type="password" name="password" id="password" class="form-control" required>
                                      @if($errors->has('password'))
                                       <span class="text-danger">{{$errors->first('password')}}</span>
                                       @endif
                                 </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirmation" class="col-md-4 col-form-lable text-md-right">Confirmation Password</label>
                                 <div class="col-md-6">
                                     <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                      @if($errors->has('password_confirmation'))
                                       <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                                       @endif
                                 </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthdate" class="col-md-4 col-form-lable text-md-right">DateOfBirth</label>
                                 <div class="col-md-6">
                                     <input type="date" name="birthdate" id="birthdate" class="form-control" required>
                                      @if($errors->has('birthdate'))
                                       <span class="text-danger">{{$errors->first('birthdate')}}</span>
                                       @endif
                                 </div>
                            </div>

                           <div class="form-group row">
                                <label for="birthplace" class="col-md-4 col-form-lable text-md-right">PlaceOfBirth</label>
                                 <div class="col-md-6">
                                     <input type="text" name="birthplace" id="birthplace" class="form-control" required>
                                      @if($errors->has('birthplace'))
                                       <span class="text-danger">{{$errors->first('birthplace')}}</span>
                                       @endif
                                 </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="requestgrade" class="col-md-4 col-form-lable text-md-right">RequestGrade</label>
                                 <div class="col-md-6">
                                     <input type="number" name="requestgrade" id="requestgrade" class="form-control" required>
                                      @if($errors->has('requestgrade'))
                                       <span class="text-danger">{{$errors->first('requestgrade')}}</span>
                                       @endif
                                 </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-lable text-md-right">Gender</label>
                                 <div class="col-md-6">
                                     <input type="radio" name="gender" id="male" value="male" class="form-control" required>
                                     <label for="male">Male</label>
                                     <input type="radio" name="gender" id="female" value="female" class="form-control" required>
                                     <label for="male">Female</label>
                                      @if($errors->has('gender'))
                                       <span class="text-danger">{{$errors->first('gender')}}</span>
                                       @endif
                                 </div>
                            </div>

                            <div class="form-group row">
                                <label for="school" class="col-md-4 col-form-lable text-md-right">School</label>
                                 <div class="col-md-6">
                                     <input type="text" name="school" id="school" class="form-control" required>
                                      @if($errors->has('school'))
                                       <span class="text-danger">{{$errors->first('school')}}</span>
                                       @endif
                                 </div>
                            </div>

                            <div class="form-group row">
                                <label for="schoolgrade" class="col-md-4 col-form-lable text-md-right">SchoolGrade</label>
                                 <div class="col-md-6">
                                     <input type="number" name="schoolgrade" id="schoolgrade" class="form-control" required>
                                      @if($errors->has('schoolgrade'))
                                       <span class="text-danger">{{$errors->first('schoolgrade')}}</span>
                                       @endif
                                 </div>
                            </div>

                            <div class="form-group row">
                                <label for="fathername" class="col-md-4 col-form-lable text-md-right">Father Name</label>
                                 <div class="col-md-6">
                                     <input type="text" name="fathername" id="fathername" class="form-control" required>
                                      @if($errors->has('fathername'))
                                       <span class="text-danger">{{$errors->first('fathername')}}</span>
                                       @endif
                                 </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="f_occupation" class="col-md-4 col-form-lable text-md-right">Father Occupation</label>
                                 <div class="col-md-6">
                                     <input type="text" name="f_occupation" id="f_occupation" class="form-control" required>
                                      @if($errors->has('f_occupation'))
                                       <span class="text-danger">{{$errors->first('f_occupation')}}</span>
                                       @endif
                                 </div>
                            </div>

                            <div class="form-group row">
                                <label for="f_place" class="col-md-4 col-form-lable text-md-right">Father Place</label>
                                 <div class="col-md-6">
                                     <input type="text" name="f_place" id="f_place" class="form-control" required>
                                      @if($errors->has('f_place'))
                                       <span class="text-danger">{{$errors->first('f_place')}}</span>
                                       @endif
                                 </div>
                            </div>

                            <div class="form-group row">
                                <label for="mothername" class="col-md-4 col-form-lable text-md-right">Mother Name</label>
                                 <div class="col-md-6">
                                     <input type="text" name="mothername" id="mothername" class="form-control" required>
                                      @if($errors->has('mothername'))
                                       <span class="text-danger">{{$errors->first('mothername')}}</span>
                                       @endif
                                 </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="m_occupation" class="col-md-4 col-form-lable text-md-right">Mother Occupation</label>
                                 <div class="col-md-6">
                                     <input type="text" name="m_occupation" id="m_occupation" class="form-control" required>
                                      @if($errors->has('m_occupation'))
                                       <span class="text-danger">{{$errors->first('m_occupation')}}</span>
                                       @endif
                                 </div>
                            </div>

                            <div class="form-group row">
                                <label for="m_place" class="col-md-4 col-form-lable text-md-right">Mother Place</label>
                                 <div class="col-md-6">
                                     <input type="text" name="m_place" id="m_place" class="form-control" required>
                                      @if($errors->has('m_place'))
                                       <span class="text-danger">{{$errors->first('m_place')}}</span>
                                       @endif
                                 </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone1" class="col-md-4 col-form-lable text-md-right">Phone Number1</label>
                                 <div class="col-md-6">
                                     <input type="number" name="phone1" id="phone1" class="form-control" required>
                                      @if($errors->has('phone1'))
                                       <span class="text-danger">{{$errors->first('phone1')}}</span>
                                       @endif
                                 </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="phone2" class="col-md-4 col-form-lable text-md-right">Phone Number2</label>
                                 <div class="col-md-6">
                                     <input type="number" name="phone2" id="phone2" class="form-control" required>
                                      @if($errors->has('phone2'))
                                       <span class="text-danger">{{$errors->first('phone2')}}</span>
                                       @endif
                                 </div>
                            </div>

                            <div class="form-group row">
                                <label for="emergencyContact" class="col-md-4 col-form-lable text-md-right">Emergency Contact Number</label>
                                 <div class="col-md-6">
                                     <input type="number" name="emergencyContact" id="emergencyContact" class="form-control" required>
                                      @if($errors->has('emergencyContact'))
                                       <span class="text-danger">{{$errors->first('emergencyContact')}}</span>
                                       @endif
                                 </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-lable text-md-right">Address</label>
                                 <div class="col-md-6">
                                     <textarea name="address" id="address" rows="4" class="form-control" required></textarea>
                                      @if($errors->has('address'))
                                       <span class="text-danger">{{$errors->first('address')}}</span>
                                       @endif
                                 </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_created" class="col-md-4 col-form-lable text-md-right">Date of Data Input</label>
                                 <div class="col-md-6">
                                     <input type="date" name="date_created" id="date_created" class="form-control" required>
                                      @if($errors->has('date_created'))
                                       <span class="text-danger">{{$errors->first('date_created')}}</span>
                                       @endif
                                 </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="admissioncategory" class="col-md-4 col-form-lable text-md-right">Admission Category</label>
                                 <div class="col-md-6">
                                     <select name="admissioncategory" id="admissioncategory" class="form-control" required>
                                         <option value="">_ _</option>
                                         <option value="Online">Online</option>
                                         <option value="Physical">Physical</option>
                                     </select>
                                      @if($errors->has('admissioncategory'))
                                       <span class="text-danger">{{$errors->first('admissioncategory')}}</span>
                                       @endif
                                 </div>
                            </div>
                            


                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember">Remember me
                                        </label>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
               </div>  
             </div>
         </div>
     </div>
 </main>
@endsection