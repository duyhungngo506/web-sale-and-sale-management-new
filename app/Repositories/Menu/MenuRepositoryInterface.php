<?php

namespace App\Repositories\Menu;

use App\Repositories\RepositoryInterface;

interface MenuRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 menu đầu tiên
    public function getMenu();
}
