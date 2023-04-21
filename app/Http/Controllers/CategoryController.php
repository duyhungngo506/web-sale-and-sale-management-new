<?php

namespace App\Http\Controllers;

use App\components\Recusive;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    /**
     * @var CategoryRepositoryInterface|\App\Repositories\Repository
     */
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepo->getAll();
        return view('admin.category.index', compact('categories'));
    }

    public function getCategory($parentId)
    {
        $categories = $this->categoryRepo->getAll();
        $recusive = new Recusive($categories);
        $htmlOptions = $recusive->categoryRecusive($parentId);
        return $htmlOptions;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $htmlOptions = $this->getCategory($parentId = "");
        return view('admin.category.create', compact('htmlOptions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->categoryRepo->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);
        return redirect('admin/categories')->with('message', 'Thêm thành công 1 danh mục');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepo->find($id);
        $htmlOptions = $this->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category', 'htmlOptions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->categoryRepo->update($id, [
            "name" => $request->name,
            "parent_id" => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);
        return redirect("/admin/categories");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function deleteCategory($id)
    // {
    //     $this->categoryRepo->update($id, [
    //         "deleted_at" => time(),
    //     ]);
    //     return redirect()->back();
    // }
    public function destroy($id)
    {
        $this->categoryRepo->delete($id);
        return redirect()->back();
    }
}
