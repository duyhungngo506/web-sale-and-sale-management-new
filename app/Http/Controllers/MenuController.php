<?php

namespace App\Http\Controllers;

use App\components\MenuRecusive;
use App\Repositories\Menu\MenuRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MenuController extends Controller
{
    /**
     * @var MenuRepositoryInterface|\App\Repositories\Repository
     */
    protected $menuRepo;
    protected $menuRecusive;

    public function __construct(MenuRepositoryInterface $menuRepo, MenuRecusive $menuRecusive)
    {
        $this->menuRepo = $menuRepo;
        $this->menuRecusive = $menuRecusive;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $menus = $this->menuRepo->getAll();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        return view('admin.menus.create', compact('optionSelect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->menuRepo->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);
        return redirect('admin/menus')->with('message', 'Thêm thành công 1 menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = $this->menuRepo->find($id);
        $optionSelect = $this->menuRecusive->menuRecusiveEdit($menu->parent_id);
        return view('admin.menus.edit', compact('menu', 'optionSelect'));
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
        $this->menuRepo->update($id, [
            "name" => $request->name,
            "parent_id" => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);
        return redirect("/admin/menus");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->menuRepo->delete($id);
        return redirect()->back();
    }
}
