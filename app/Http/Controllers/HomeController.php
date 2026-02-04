<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ) {}

    public function index()
    {
        $data = $this->productService->getHomePageData();

        return view('home', [
            'featuredProduct' => $data['featuredProduct'],
            'trendingDrops' => $data['trendingDrops']
        ]);
    }
}
