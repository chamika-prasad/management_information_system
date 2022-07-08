<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>delete_subject</title>
</head>

<body>
    @include('layouts.AdminNavbar')
    @include('layouts.Navbar_admin')
    <div class="container-fluid" style="width: 85%">
        @if (session()->has('message'))
            <div class="alert alert-success mt-5">
                {{ session()->get('message') }}
            </div>
        @endif
        <nav class="navbar navbar-light bg-light mt-5">
            <form class="form-inline" id="handlesubmit" method="get">
                <input class="form-control mr-sm-2" type="text" placeholder="Search"
                    aria-label="Search"name="subject" required id="searchVal">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <a href="{{url('/deleteSubject')}}"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">show all subjects</button></a>
        </nav>
        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">subject Code</th>
                    <th scope="col">subject Name</th>
                    <th scope="col">grade</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if (isset($_GET['subject']))
                        @if ($user->subjectName == $_GET['subject'])
                            <tr>
                                <td>{{ $user->subjectCode }}</td>
                                <td>{{ $user->subjectName }}</td>
                                <td>{{ $user->subGrade }}</td>
                                <form action="{{ url('/DeleteSub/' . $user->subjectCode) }}" method="post"
                                    onsubmit="return confirm('Are you sure?')">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <td>
                                        <button type="submit" class="btn btn-danger" name="DeleteSub">Delete</button>
                                    </td>
                                </form>
                            </tr>
                        @endif
                    @else
                        <tr>
                            <td>{{ $user->subjectCode }}</td>
                            <td>{{ $user->subjectName }}</td>
                            <td>{{ $user->subGrade }}</td>
                            <form action="{{ url('/DeleteSub/' . $user->subjectCode) }}" method="post"
                                onsubmit="return confirm('Are you sure?')">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <td>
                                    <button type="submit" class="btn btn-danger" name="DeleteSub">Delete</button>
                                </td>
                            </form>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @include('home_page.footer')

</body>
