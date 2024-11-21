<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('index');
    }

    public function getProducts(){
        $jsonPath = \storage_path('app/products.json');

        if(!file_exists($jsonPath)){
            file_put_contents($jsonPath, json_encode([]));
        }

        $products = file_get_contents($jsonPath, true);

        return \response()->json(["product"=>$products]);
    }
    public function edit($id){
        $jsonPath = \storage_path('app/products.json');
        
    }

    public function store(Request $request){


    }

    public function update(Request $request){

    }
}
