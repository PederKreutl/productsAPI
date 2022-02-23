<?php

namespace App\Models;

use \App\Contracts\ProductContract as ProductContract;
use Illuminate\Support\Facades\Storage;

class JSONProduct implements ProductContract
{
    public function getProducts() 
    {
        $content = Storage::get('public/database.json');

        return $content;
    }
}
