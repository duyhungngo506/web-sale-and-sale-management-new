<?php

namespace App\Repositories\Menu;

use App\Models\Menu;
use App\Repositories\BaseRepository;
use App\Repositories\Menu\MenuRepositoryInterface;

class MenuRepository extends BaseRepository implements MenuRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Menu::class;
    }

    public function getMenu()
    {
        return Menu::paginate(5);
    }
}
