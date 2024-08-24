<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\BorrowedBooks;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Retrieve borrowed books count
        $borrowedBooksCount = BorrowedBooks::where('user_id', $userId)->count();

        // Get the next due book
        $nextDueBook = BorrowedBooks::where('user_id', $userId)
            ->orderBy('due_date', 'asc')
            ->first();

        // Retrieve all books
        $books = Book::all();

        // Retrieve user's borrowed books
        $borrowedBooks = BorrowedBooks::where('user_id', $userId)->get();

        return view('student.index', compact('borrowedBooksCount', 'nextDueBook', 'books', 'borrowedBooks'));
    }
}
