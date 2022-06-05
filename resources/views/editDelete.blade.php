
@extends('layouts.master')
@section('content')

<h1 text -align:center>Edit or Delete book</h1>
<div class='container'>
<a class="btn btn-info float-right mb-4  " href="{{url('/addBooks')}}">Go Back</a>
  <table class="table table-dark">
    <thead>
      <tr>
      
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Author</th>
        <th scope="col">Publisher</th>
        <th scope="col">Action</th>
        <th scope="col"></th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
      <tr>
       
          <td>{{$book->name}}</td>
          <td>{{$book->category}}</td>
          <td>{{$book->author}}</td>
          <td>{{$book->publisher}}</td>
       
        <td style="display:flex">
        
        <a class="btn btn-success mr-1" href="{{url('/editBooks/'.$book->id)}}">Edit</a>
        </td>
        <td>
        <form action="{{url('/Delete/'.$book->id)}}" method="post">
        {{method_field('DELETE')}}  
        {{csrf_field()}}
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


@endsection



