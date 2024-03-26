<?php

namespace App\Services;

use App\Models\ListChild;
use Illuminate\Support\Facades\Cache;

class DoctorService
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function getCategoryName($code)
    {
        // Get List Category
        $categories = $this->categoryService->getListCategory();

        $index = array_search($code, array_column($categories, 'code'));
        return $index !== false ? $categories[$index]['name'] : '';
    }
}
