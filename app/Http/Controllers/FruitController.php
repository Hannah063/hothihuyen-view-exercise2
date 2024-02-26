<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fruit;

use function PHPSTORM_META\map;

class FruitController extends Controller
{
    public function getFruits()
    {
        return view('fruits', ['fruits' => Fruit::all()]);
    }
}
