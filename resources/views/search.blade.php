
@extends('layouts.master')
@section('content')
<div class='container'>
<h3> Books</h3>
<table class="table table-dark">
    <thead>
      <tr>
      
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Author</th>
        <th scope="col">Publisher</th>
        <th scope="col">View</th>
        <th scope="col">Download</th>
        
      </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
      <tr>
       
          <td>{{$book->name}}</td>
          <td>{{$book->category}}</td>
          <td>{{$book->author}}</td>
          <td>{{$book->publisher}}</td>
          <td><a href="{{url('/view',$book->id)}}">View</a></td>
          <td><a href="{{url('/download',$book->file)}}">Download</a></td>
        
        </form>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection