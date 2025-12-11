<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function product_detail($id)
    {
        $response = Http::withHeader('Authorization', 'Bearer '.\Auth::user()->token)
        ->get('http://localhost:8001/api/product/'.$id);

        if ($response->ok()) {
            $product = $response->json();
            return view('pages.product_detail', [
                'product' => $product
            ]);
        }
        return view('pages.product_detail', [
            'product' => false
        ]);
    }
}
