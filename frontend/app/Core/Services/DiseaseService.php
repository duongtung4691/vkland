<?php
namespace App\Core\Services;

use Illuminate\Support\Facades\DB;

class DiseaseService
{
    /**
     * Microservice: get các thông tin trong repositories
     */

    /**
     * @param $categoryId
     * @return \Illuminate\Support\Collection
     */
    public function getListDiseaseByCategoryId($categoryId)
    {
        $result = DB::table('category_has_diseases')
            ->select('categories.slug as catslug', 'diseases.id as disid', 'diseases.slug as dislug', 'diseases.name as disname')
            ->join('categories', 'category_has_diseases.category_id', '=', 'categories.id')
            ->join('diseases', 'category_has_diseases.disease_id', '=', 'diseases.id')
            ->where('category_id', $categoryId)
            ->get();
        return $result;
    }
}
