<?php

namespace App\Http\DTO;

use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock;
use PhpParser\Node\Expr\Cast\Double;

class ProductDTO
{
    public ?int $id;

    public ?string $name;

    public ?string $color;

    public ?string $size;

    public ?double $price;

    public ?double $factoryIdentity;

    public function transform($request ,?int $id = null)
    {
        if($request->filled('name')!==null)
        {
            $this->name =  $request->get('name');
        }
        if($request->filled('color')!==null)
        {
            $this->color = $request->get('color');
        }
        if($request->filled('size')!==null)
        {
            $this->size =  $request->get('size');
        }
        if($request->filled('price')!==null)
        {
            $this->price = $request->get('price');
        }
        if($id!==null)
        {
            $this->id = $id;
        }
        if(Auth::user()->getAuthIdentifier()!==null)
        {
            $this->id = Auth::user()->getAuthIdentifier();
        }

        return $this;
    }

}
