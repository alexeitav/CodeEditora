<?php

namespace CodePub\Http\Controllers;

use CodePub\Http\Requests\BookRequest;
use CodePub\Repositories\BookRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BooksController extends Controller
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
        //$this->repository->pushCriteria(new FindByAuthorCriteria());
        $books = $this->repository->paginate(10);

        return view('books.index', compact('books', 'search'));

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

        $input = $request->all();
        $this->repository->create([
            'title' => $input['title'],
            'subtitle' => $input['subtitle'],
            'price' => $input['price'],
            'author_id' => Auth::user()->id,
        ]);

        $url = $request->get('redirect_to', route('books.index'));
        $request->session()->flash('message', 'Livro cadastrado com sucesso');
        return redirect()->to($url);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $book = $this->repository->find($id);

        if($book->author_id != Auth::user()->id) {
            //throw new ModelNotFoundException('Voce nao e o autor desse livro.');
            Session::flash('message', 'Voce nao e o autor desse livro');
            return redirect()->back();
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
    public function update(BookRequest $request, $id)
    {
        $book = $this->repository->find($id);

        if($book->author_id != Auth::user()->id) {
            throw new ModelNotFoundException('Voce nao e o autor desse livro.');
        }

        $book->fill($request->all());
        $book->save();
        $url = $request->get('redirect_to', route('books.index'));
        $request->session()->flash('message', 'Livro cadastrado com sucesso');
        return redirect()->to($url);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $book = $this->repository->find($id);

        if($book->author_id != Auth::user()->id) {
            throw new ModelNotFoundException('Voce nao e o autor desse livro.');
        }

        $book->delete();
        session()->flash('message', 'Livro excluido com sucesso');
        return redirect()->back();
    }


    public function delete($id)
    {

        $book = $this->repository->find($id);

        if($book->author_id != Auth::user()->id) {
            throw new ModelNotFoundException('Voce nao e o autor desse livro.');

        }

        return view('books.modal.delete', compact('book'));

    }
}
