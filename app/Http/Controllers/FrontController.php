<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontController extends Controller
{
    public function home(Request $request)
    {
        return view('front-pages.home');
    }

    public function whyUs(Request $request)
    {
        return view('front-pages.why-us');
    }

    public function vendors(Request $request)
    {
        return view('front-pages.vendors');
    }

    public function contactUs(Request $request)
    {
        return view('front-pages.contact-us');
    }

    public function products(Request $request)
    {
        return view('front-pages.products');
    }

    public function productDetails(Request $request, $id)
    {
        return view('front-pages.product-details');
    }

    public function shoppingCart(Request $request)
    {
        return view('front-pages.shopping-cart');
    }

    public function category(Request $request)
    {
        return view('front-pages.category');
    }

    public function subcategory(Request $request)
    {
        return view('front-pages.subcategory');
    }

    public function membership(Request $request)
    {
        return view('front-pages.membership');
    }

    public function jobOpenings(Request $request)
    {
        return view('front-pages.job-opening');
    }

    public function gallery(Request $request)
    {
        return view('front-pages.gallery');
    }

    public function faqs(Request $request)
    {
        return view('front-pages.faqs');
    }

    public function careers(Request $request)
    {
        return view('front-pages.careers');
    }

    public function bulkOrder(Request $request)
    {
        return view('front-pages.bulk-order');
    }

    public function blogs(Request $request)
    {
        return view('front-pages.blogs');

    }

    public function blogDetails(Request $request, $id)
    {
        return view('front-pages.blog-details');
    }

    public function aboutUs(Request $request)
    {
        return view('front-pages.about-us');
    }

    public function awards(Request $request)
    {
        return view('front-pages.awards');
    }

}