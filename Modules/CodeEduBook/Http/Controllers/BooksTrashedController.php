<?php

namespace CodeEduBook\Http\Controllers;

use CodePub\Http\Controllers\Controller;
use CodeEduBook\Repositories\BookRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BooksTrashedController extends Controller
{
    /**
     * @var \CodeEduBook\Repositories\BookRepository
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

        return view('codeedubook::trashed.books.index', compact('books', 'search'));

    }

    public function show($id)
    {

        $this->repository->onlyTrashed();
        $book = $this->repository->find($id);

        return view('codeedubook::trashed.books.show', compact('book'));

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

        return view('codeedubook::trashed.books.modal.undelete', compact('book'));

    }

}
