<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('index');
    }

    public function getProducts(){
        $jsonFilePath = storage_path("app/products.json");

        $products = file_exists($jsonFilePath)? json_decode(file_get_contents($jsonFilePath, true)): [];

        return response()->json(["products"=>$products]);
    }

    public function edit($id){
        $jsonFilePath = \storage_path('app/products.json');

        $products = file_exists($jsonFilePath) ? json_decode(file_get_contents($jsonFilePath, true)) : [];

        $productIndex = $id;

        if(isset($products[$productIndex])){
            return response()->json($products[$productIndex]);
        }else{
            return response()->json(["error"=> "Something went wrong"]);
        }
    }

    public function store(Request $request){
        $jsonFilePath = storage_path('app/products.json');

        if(!file_exists($jsonFilePath)){
            file_put_contents($jsonFilePath, json_encode([]));
        }

        $products = json_decode(file_get_contents($jsonFilePath, true));

        $newProduct = [
            "name" => $request->name,
            "quantity" => $request->quantity,
            "price" => $request->price,
            'total_value' => $request->quantity * $request->price,
            "datetime" => now()
        ];

        $products[] = $newProduct;

        file_put_contents($jsonFilePath, json_encode($products, JSON_PRETTY_PRINT) );

        return \response()->json($products);

    }
    public function update(Request $request){
 
        $jsonFilePath = storage_path('app/products.json');

      
        $products = file_exists($jsonFilePath) ? json_decode(file_get_contents($jsonFilePath, true)) : [];

        $productIndex = $request->id;

        if(isset($products[$productIndex])){
            $products[$productIndex] = [
                "name" => $request->name,
                "quantity" => $request->quantity,
                "price" => $request->price,
                "datetime" => now(),
                "total_value" => $request->quantity * $request->price,
            ];
    
            file_put_contents($jsonFilePath, json_encode($products, JSON_PRETTY_PRINT));
            return response()->json($products[$productIndex]);
        }else{
            return response()->json(["error"=> "Something went wrong"]);
        }
    }
}
