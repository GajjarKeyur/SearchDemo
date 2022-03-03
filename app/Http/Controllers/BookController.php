<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //
    public function add(Request $request)
    {
        $book = new Book();
        $book->book_name = $request->book_name;
        $book->book_author = $request->book_author;
        $book->book_price = $request->book_price;
        $book->book_pages = $request->book_pages;
        $book->author_id = $request->author_id;
        $book->save();

        return response()->json([
            'message'=>"Books Data added successfully..!!",
            'status'=>200
        ]);
    }
    
}
