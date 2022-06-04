
@extends('layouts.master')
@section('content')

<h1 text -align:center>Add book</h1>

<div class="container">

  <a class="btn btn-info float-right mb-4  custom" href="{{url('/addBooks')}}">Go Back</a>

  <form method="post" action="{{url('/addBooks')}}" enctype="multipart/form-data">
  @csrf
    <div class=" mb-3 form-group">
      <label for="input1">Book name</label>
      <input id="name" type="text" name="name" value="{{old('name')}}" class="form-control"  placeholder="Enter book Name" >
    </div>
    <div class="mb-3 form-group">
      <label for="input2">Category</label>
      <input id="category" type="text" name="category"  value="{{old('category')}}" class="form-control"  placeholder="Enter Category Name">
    </div>
    <div class="mb-3 form-group">
      <label for="input3">Author</label>
      <input id="author" type="text" name="author"  value="{{old('author')}}" class="form-control"  placeholder="Enter Author Name">
    </div>
    <div class="mb-3 form-group">
      <label for="input4">Publisher</label>
      <input id="publisher" type="text" name="publisher"  value="{{old('publisher')}}" class="form-control"  placeholder="Enter Publisher Name">
    </div>

    <div class="mb-3 form-group">
    <input type="file" name="file"  value="{{old('file')}}">
    </div>

    <div class="mb-3 form-check mt-4">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>

  
  <button type="submit" class="btn btn-primary custom" href="{{url('/addBooks')}}">Add</button>
    

  </form>
</div>

<div class="container mt-2">
  @if(session()->has('message'))
      <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
  @endif
</div>

@endsection

