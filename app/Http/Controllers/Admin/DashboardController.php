<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Package;
use App\Models\Enquiry;
use App\Models\ContactEnquiry;

class DashboardController extends Controller
{

    public function index()
    {
        $data = [
            'products' => Product::count(),
            'categories' => Category::count(),
            'packages' => Package::count(),

            'enquiries' => Enquiry::count(),
            'contactEnquiries' => ContactEnquiry::count(),

            'todayEnquiries' => Enquiry::whereDate('created_at', today())->count(),
        ];

        // latest enquiries (for table)
        $latestEnquiries = Enquiry::latest()->take(5)->get();

        return view('admin.dashboard.index', compact('data', 'latestEnquiries'));
    }
}
