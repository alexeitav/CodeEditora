<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$books = Book::query()->paginate(15);
        $books = Book::where('user_id', Auth::user()->id)->paginate(15);
        return view('books.index', compact('books'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        //Book::create($request->all());
        $input = $request->all();
        Book::create([
            'title' => $input['title'],
            'subtitle' => $input['subtitle'],
            'price' => $input['price'],
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('books.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {

        if($book->user_id != Auth::user()->id) {
            throw new ModelNotFoundException('Voce nao e o autor desse livro.');
        }

        return view('books.edit', compact('book'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        if($book->user_id != Auth::user()->id) {
            throw new ModelNotFoundException('Voce nao e o autor desse livro.');
        }

        $book->fill($request->all());
        $book->save();
        return redirect()->route('books.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if($book->user_id != Auth::user()->id) {
            throw new ModelNotFoundException('Voce nao e o autor desse livro.');
        }

        $book->delete();
        return redirect()->back();
    }


    public function delete(Book $book)
    {

        if($book->user_id != Auth::user()->id) {
            throw new ModelNotFoundException('Voce nao e o autor desse livro.');
        }

        return view('books.modal.delete', compact('book'));

    }
}
