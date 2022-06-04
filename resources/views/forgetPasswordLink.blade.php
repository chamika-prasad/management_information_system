@extends('layout')

@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">

                     @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                     @endif
                     <form action="{{route('reset.password.post')}}" method="POST">
                            @csrf 
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" id="email" class="form-control" required autofocus>
                                    @if($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" name="password" id="password" class="form-control" required autofocus>
                                    @if($errors->has('password'))
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Password Confirmation</label>
                                <div class="col-md-6">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autofocus>
                                    @if($errors->has('password_confirmation'))
                                    <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
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