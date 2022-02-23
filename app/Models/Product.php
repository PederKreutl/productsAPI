<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Contracts\ProductContract as ProductContract;
use App\Http\Resources\Product as ProductResource;


class Product extends Model implements ProductContract
{
    use HasFactory;

    public function __construct($connectionType = 'mysql')
    {
        $this->connection = $connectionType;
    }

    public function getProducts() 
    {                            
        $products = $this->orderBy('created_at', 'desc')->paginate(10);

        return ProductResource::collection($products);
    }
}

