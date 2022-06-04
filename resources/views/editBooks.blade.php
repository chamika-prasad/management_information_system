
@extends('layouts.master')
@section('content')

<h1 text -align:center>Edit book</h1>

<div class="container">

<a class="btn btn-info float-right mb-4  custom" href="{{url('/editDelete')}}">Go Back</a>

<form method="post" action="{{url('/editBooks/'.$book->id)}}" enctype="multipart/form-data">
@csrf
  <div class=" mb-3 form-group">
    <label for="input1">Book name</label>
    <input id="name" type="text" name="name" class="form-control"  value="{{old('name') ?? $book->name}}">
  </div>
  <div class="mb-3 form-group">
    <label for="input2">Category</label>
    <input id="category" type="text" name="category" class="form-control" value="{{old('category') ?? $book->category}}">
  </div>
  <div class="mb-3 form-group">
    <label for="input3">Author</label>
    <input id="author" type="text" name="author" class="form-control" value="{{old('author') ?? $book->author}}" >
  </div>
  <div class="mb-3 form-group">
    <label for="input4">Publisher</label>
    <input id="publisher" type="text" name="publisher" class="form-control" value="{{old('publisher') ?? $book->publisher}}">
  </div>

  <div class="mb-3 form-group">
  <input type="file" name="file"  value="{{old('file') ?? $book->file}}" src="/pdfs/{{$book->file}}">
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>


 <button type="submit" class="btn btn-primary custom" href="{{url('/addBooks')}}">Add</button>
  

</form>
</div>



@endsection
