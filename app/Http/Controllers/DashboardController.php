<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ) {}

    public function index()
    {
        $dashboardData = $this->productService->getUserDashboardData();

        return view('dashboard', $dashboardData);
    }
}
