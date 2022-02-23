<?php

namespace App\Models;

use \App\Contracts\ProductContract as ProductContract;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redis;

class RedisProduct implements ProductContract
{
    public function getProducts() 
    {
        $redis = Redis::Connection();

        // // Initialization of redis database with data from json file
        // $content = Storage::get('public/redis_init.json');
        // $redis = app()->make('redis');
        // $redis->set('products', $content);

        $content = $redis->get('products');

        return $content;
    }
}
