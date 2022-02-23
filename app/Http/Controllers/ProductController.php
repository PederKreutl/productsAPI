<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Contracts\ProductContract as ProductContract;
use \App\Models\Product as Product;
use \App\Models\JSONProduct as JSONProduct;
use \App\Models\RedisProduct as RedisProduct;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($database)
    {
        if ($database == 'mariaDB1') {
            return $this->getProducts(new Product('mysql'));
        }
        else if ($database == 'mariaDB2') {
            return $this->getProducts(new Product('mysql2'));
        }
        else if ($database == 'json') {
            return $this->getProducts(new JSONProduct);
        }
        else if ($database == 'redis') {
            return $this->getProducts(new RedisProduct);
        }
    }

    public function getProducts(ProductContract $product_contract)
    {
        return $product_contract->getProducts();
    }
}
