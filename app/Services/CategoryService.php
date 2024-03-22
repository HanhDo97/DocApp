<?php

namespace App\Services;

use App\Models\ListChild;
use Illuminate\Support\Facades\Cache;

class CategoryService
{
    public function getListCategory(): array
    {
        // Get List Category
        $categories = Cache::get('categories');
        if (empty($categories)) {
            $categories = ListChild::query()->select('code', 'name')->where('list_id', '1')->get()->toArray();
            Cache::set('categories', $categories);
        }

        return $categories;
    }
}
