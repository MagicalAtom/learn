<?php

namespace mswco\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use mswco\Category\Models\Category;
use mswco\Category\Repositories\CategoryRepository;
use mswco\Category\Requests\CategoryStoreRequest;
use mswco\Category\Response\AjaxResponse;

class CategoryController extends Controller
{
    public $repo ;
    public function __construct(CategoryRepository $repo)
    {
    $this->repo = $repo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = $this->repo->all();
        return view('Categories::category',compact('all'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $this->repo->create($request);
        return back()->with('status','create');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = $this->repo->all();
        return view('Categories::edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryStoreRequest $request, Category $category)
    {
    $this->repo->update($category,$request);
    return redirect()->to('/category')->with('status','update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repo->delete($id);
        return response()->json(['message'=>'با موفقیت انجام شد'],Response::HTTP_OK);
    }
}
