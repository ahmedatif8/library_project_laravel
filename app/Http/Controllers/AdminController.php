<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\book;

use App\Models\BorrowedBooks;

use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function index()
    {

        if (Auth::id()) {
            $user_type = Auth()->user()->usertype;
            if ($user_type == 'admin') {
                $books = book::all();
                return view('admin.index', ['books' => $books]);
            } elseif ($user_type == 'user') {
                $userId = Auth::id();
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
                // return view('student.index');

            }
        } else {
            return redirect()->back();
        }
    }

    public function add()
    {
        return view('admin.add');
    }
    public function edit($id)
    {
        $book = book::findOrFail($id);
        return view('admin.edit', ['books' => $book]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'author' => ['required', 'string', 'max:1000']

        ]);
        $book = new book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->status = $request->status;
        $book->save();
        return redirect('home/add')->with('success', 'book added successfully');

    }
    public function destroy($id)
    {
        $book = book::findOrFail($id);
        $book->delete();
        return back()->with('success', 'post deleted successfully');

    }
    public function update($id, Request $request)
    {
        $request->validate([
            // 'title' => ['required', 'string', 'min:3'],
            // 'author' => ['required', 'string', 'max:1000']
        ]);
        $book = book::findOrFail($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->status = $request->status;

        $book->save();
        return redirect('home')->with('success', 'book updated successfully');
    }
    public function borrow($id)
    {
        $userId = Auth::id(); // Get the authenticated user ID

        // تحقق من توفر الكتاب
        $book = Book::findOrFail($id);

        if ($book->status == 'available') {
            // تحديث حالة الكتاب إلى "غير متاح"
            $book->status = 'checked-out';
            $book->save();

            // إضافة سجل في جدول الكتب المستعارة
            BorrowedBooks::create([
                'user_id' => $userId,
                'book_id' => $book->id,
                'borrowed_on' => now(),
                'due_date' => now()->addDays(10), // فرضًا فترة الاستعارة 10 أيام
            ]);

            return redirect()->back()->with('success', 'Book borrowed successfully!');
        } else {
            return redirect()->back()->with('error', 'Book is not available.');
        }
    }

    public function return($id)
    {
        $userId = Auth::id(); // Get the authenticated user ID

        // الحصول على السجل الذي يمثل استعارة الكتاب
        $borrowedBook = BorrowedBooks::where('book_id', $id)->where('user_id', $userId)->firstOrFail();

        // تحديث حالة الكتاب إلى "متاح"
        $book = Book::findOrFail($borrowedBook->book_id);
        $book->status = 'available';
        $book->save();

        // حذف السجل من جدول الكتب المستعارة
        $borrowedBook->delete();

        return redirect()->back()->with('success', 'Book returned successfully!');
    }
}
