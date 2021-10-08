<?php

namespace App\Repositories;

use App\Models\Products;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Products::class;
    }

    public function show($id)
    {
        $products = Products::find($id);
        return $products;
    }

    public function deleteProduct($id)
    {
        $result = DB::delete("DELETE FROM `products` WHERE `product_id` = $id");
        return $result;
    }
}
