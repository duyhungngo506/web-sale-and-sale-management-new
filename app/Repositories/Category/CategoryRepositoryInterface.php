<?php

namespace App\Repositories\Category;

use App\Repositories\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 danh mục đầu tiên
    public function getCategory();
}
