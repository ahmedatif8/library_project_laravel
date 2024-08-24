<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin Dashboard - Library System</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/home')}}">Library System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Students</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <x-app-layout>
                    </x-app-layout>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <!-- Dashboard Overview -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Total Borrowed Books</h5>
                        <p class="card-text">15</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Total Books</h5>
                        <p class="card-text">20</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text">10</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Books Table -->
        <div class="card mb-4">
            <div class="card-header">
                All Books
                <a href="{{url('home/add')}}" class="btn btn-sm btn-primary float-end">Add New Book</a>
            </div>
            <div class="card-body">
                @if (session()->get('success'))
                    <h3 class="text-success my-2">{{session()->get('success')}}</h3>

                @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>ISBN</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{$book->title}}</td>
                                <td>{{$book->author}}</td>
                                <td>{{$book->isbn}}</td>
                                <td><span class="badge bg-success">{{$book->status}}</span></td>
                                <td>
                                    <a href="{{url('home/' . $book->id) .'/edit'}}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form action="{{url('home/' . $book->id)}}" method="post"
                                        class="btn btn-sm btn-outline-danger">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" value="delete">
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                        <!-- More rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Student Search -->
        <div class="card mb-4">
            <div class="card-header">
                Search Student
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="studentId" class="form-label">Student ID</label>
                        <input type="text" class="form-control" id="studentId" placeholder="Enter Student ID">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
