<?php

namespace CodeEduBook\Http\Controllers;

use CodePub\Http\Controllers\Controller;
use CodeEduBook\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoriesTrashedController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $repository;


    function __construct(CategoryRepository $repository)
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
        $categories = $this->repository
            ->onlyTrashed()
            ->paginate(10);

        return view('codeedubook::trashed.categories.index', compact('categories', 'search'));

    }


    public function restore($id)
    {

        $this->repository->onlyTrashed();
        $this->repository->restore($id);
        session()->flash('message', 'Categoria restaurada com sucesso');
        return redirect()->back();
    }


    public function undelete($id)
    {

        $this->repository->onlyTrashed();
        $category = $this->repository->find($id);

        return view('codeedubook::trashed.categories.modal.undelete', compact('category'));

    }

}
