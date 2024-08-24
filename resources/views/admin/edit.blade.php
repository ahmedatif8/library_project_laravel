@extends('layout.app')
@section('content')



<!-- Main Content -->
<div class="container mt-4">
    <h1 class="p-3 text-center my-3">edit Book</h1>
    <form action="{{url('home/'. $books->id)}}" method="post">
        @method('PUT')
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger p-1">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <label for="bookTitle" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{$books->title}}" id="bookTitle" required>
        </div>
        <div class="mb-3">
            <label for="bookAuthor" class="form-label">Author</label>
            <input type="text" class="form-control" name="author" value="{{$books->author}}" id="bookAuthor" required>
        </div>
        <div class="mb-3">
            <label for="bookIsbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" name="isbn" value="{{$books->isbn}}" id="bookIsbn" required>
        </div>
        <div class="mb-3">
            <label for="bookStatus" class="form-label">Status</label>
            <select class="form-select" name="status" id="bookStatus">
                <option value="available">Available</option>
                <option value="checked-out">Checked Out</option>
            </select>
        </div>
        <div class="mb-3">
            <input type="submit" value="update" class="form-control bg-info">
        </div>
    </form>
</div>
@endsection
