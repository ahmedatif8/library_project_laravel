<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Student Dashboard - Library System</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/home') }}">Library System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Welcome, {{ Auth::user()->name }}!</h5>
                        <p class="card-text">You have borrowed <strong>4</strong> books.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Next Book Due</h5>
                        <p class="card-text">30/08/2024
</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Books Table -->
        <div class="card mb-4">
            <div class="card-header">
                View All Books
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->genre }}</td>
                            <td>
                                @if($book->status == 'available')
                                    <span class="badge bg-success">Available</span>
                                @else
                                    <span class="badge bg-secondary">Unavailable</span>
                                @endif
                            </td>
                            <td>
                                @if($book->status == 'available')
                                    <form action="{{ route('books.borrow', $book->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-primary">Borrow</button>
                                    </form>
                                @else
                                    <button class="btn btn-sm btn-secondary" disabled>Borrow</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Borrowed Books -->
        <div class="card mb-4">
            <div class="card-header">
                Your Borrowed Books
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($borrowedBooks as $borrowedBook)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        "Introduction to Algorithms"
                        <span>
                            <form action="{{ route('books.return', $borrowedBook->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button class="btn btn-sm btn-danger">Return</button>
                            </form>
                            <span class="badge bg-warning">Due on 30/08/2024</span>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
