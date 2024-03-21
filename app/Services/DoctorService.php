<?php

namespace App\Services;

use App\Models\ListChild;
use Illuminate\Support\Facades\Cache;

class DoctorService
{
    public function getCategoryName($code)
    {
        // Get List Category
        $categories = Cache::get('categories');
        if (empty($categories)) {
            $categories = ListChild::query()->select('code', 'name')->where('list_id', '1')->get()->toArray();
            Cache::set('categories', $categories);
        }

        $index = array_search($code, array_column($categories, 'code'));
        return $index !== false ? $categories[$index]['name'] : '';
    }
}
