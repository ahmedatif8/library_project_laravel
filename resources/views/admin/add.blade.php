@extends('layout.app')
@section('content')



<!-- Main Content -->
<div class="container mt-4">
    <h1>Add New Book</h1>
    <form action="{{url('home/store')}}" method="post">
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
        @if (session()->get('success'))
            <h3 class="text-success my-2">{{session()->get('success')}}</h3>

        @endif
        <div class="mb-3">
            <label for="bookTitle" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="bookTitle" value="{{old('title')}}" required>
        </div>
        <div class="mb-3">
            <label for="bookAuthor" class="form-label">Author</label>
            <input type="text" class="form-control" name="author" value="{{old('author')}}" id="bookAuthor" required>
        </div>
        <div class="mb-3">
            <label for="bookIsbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" name="isbn" value="{{old('isbn')}}" id="bookIsbn" required>
        </div>
        <div class="mb-3">
            <label for="bookStatus" class="form-label">Status</label>
            <select class="form-select" name="status" id="bookStatus">
                <option value="available">Available</option>
                <option value="checked-out">Checked Out</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>
@endsection
