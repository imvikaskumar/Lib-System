<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\IssueBook;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        $auth = auth()->user();
        $search_input = $request->search_input ?? NULL;
        $books = Book::active()
                ->ofSearchBook($search_input)
                ->orderBy('created_at')
                ->get();
        return view('books.index', compact('books'));
    }

    public function bookHistoryOfYours()
    {
        $books = IssueBook::where('assigned_user_id', auth()->user()->id)->with('myBook')->get();
        return view('books.issued-books', compact('books'));
    }

    public function changeStatusOfReturnedBook($bookID)
    {
        try {
            $issueBook = IssueBook::where(["id" => $bookID, "assigned_user_id" => \Auth::user()->id])->firstOrFail();
            $issueBook->returned_datetime = \Carbon\Carbon::now();
            $issueBook->save();
            $book = Book::findOrfail($issueBook->book_id);
            $book->availability = 1;
            $book->save();
            return back();
        } catch (\Throwable $e) {
            dd($e);
        }
    }

    public function changeStatus($bookID)
    {
        try {
            $book = Book::findOrfail($bookID);
            $book->availability = 0;
            $book->save();
            $issueBook = new IssueBook();
            $issueBook->book_id = $bookID;
            $issueBook->assigned_user_id = \Auth::user()->id;
            $issueBook->assigned_datetime = \Carbon\Carbon::now();
            $issueBook->save();
            return back();
        } catch (\Throwable $e) {
            dd($e);
        }
    }
}