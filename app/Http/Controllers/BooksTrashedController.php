<?php

namespace CodePub\Http\Controllers;

use CodePub\Repositories\BookRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BooksTrashedController extends Controller
{
    /**
     * @var BookRepository
     */
    private $repository;


    function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->get('search');
        $books = $this->repository
            ->onlyTrashed()
            ->paginate(10);

        return view('trashed.books.index', compact('books', 'search'));

    }

    public function show($id)
    {

        $this->repository->onlyTrashed();
        $book = $this->repository->find($id);

        return view('trashed.books.show', compact('book'));

    }


    public function restore($id)
    {

        $this->repository->onlyTrashed();
        $book = $this->repository->find($id);

        if(!isset($book->author_id) OR $book->author_id != Auth::user()->id) {
            throw new ModelNotFoundException('Voce nao e o autor desse livro.');
        }

        $this->repository->restore($id);
        session()->flash('message', 'Livro restaurado com sucesso');
        return redirect()->back();
    }


    public function undelete($id)
    {

        $this->repository->onlyTrashed();
        $book = $this->repository->find($id);

        if(!isset($book->author_id) OR $book->author_id != Auth::user()->id) {
            throw new ModelNotFoundException('Voce nao e o autor desse livro.');

        }

        return view('trashed.books.modal.undelete', compact('book'));

    }

}
