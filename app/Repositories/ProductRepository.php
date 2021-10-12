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

    public function insert($dto)
    {
        $result = DB::table('products')->insert([
            'name' => $dto->name,
            'price' => $dto->price,
            'color' => $dto->color,
            'size' => $dto->size,
            'factory_identity' => $dto->factoryIdentity,
        ]);
        return $result;
    }

    public function updateproduct($dto)
    {
        $result = DB::table('products')->where('id','=', $dto->id)->update([
            'name' => $dto->name,
            'price' => $dto->price,
            'color' => $dto->color,
            'size' => $dto->size,
            'factory_identity' => $dto->factoryIdentity,
        ]);
        return $result;
    }

    public function showAll($perPage)
    {
        $result = DB::table('products')->select('*')->paginate($perPage);
        return $result;
    }
}
