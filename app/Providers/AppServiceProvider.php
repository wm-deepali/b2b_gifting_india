<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use Illuminate\Support\Facades\View;
use App\Models\DynamicPage;
use App\Models\Announcement;
use App\Models\SmtpSetting;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {


        View::composer('*', function ($view) {

            $sessionId = session()->getId();

            $cart = Cart::with([
                'items.product.images',
                'items.customization'
            ])
                ->where('session_id', $sessionId)
                ->first();

            $count = $cart ? $cart->items->count() : 0;

            $view->with([
                'globalCartCount' => $count,
                'miniCart' => $cart,
            ]);
        });


        View::composer('*', function ($view) {

            $pages = DynamicPage::where('status', 1)->get();

            $view->with('footerPages', $pages);
        });


        View::composer('*', function ($view) {

            $announcements = Announcement::where('status', 1)
                ->latest()
                ->get();

            $view->with(
                'announcements',
                $announcements
            );
        });

        View::composer('*', function ($view) {

            $wishlistCount = \App\Models\Wishlist::where(
                'session_id',
                session()->getId()
            )->count();
            $view->with(
                'wishlistCount',
                $wishlistCount
            );
        });


        View::composer('*', function ($view) {

            $footerCategories = \App\Models\Category::where('status', 1)
                ->whereNull('parent_id')
                ->orderBy('sort_order')
                ->take(10)
                ->get();

            $view->with(
                'footerCategories',
                $footerCategories
            );

        });

        View::composer('*', function ($view) {

            $footerSetting = \App\Models\FooterSetting::first();

            $view->with(
                'footerSetting',
                $footerSetting
            );

        });


        View::composer('*', function ($view) {

            $popularCategories = \App\Models\Category::where('status', 1)
                ->where('is_popular', 1)
                ->whereNull('parent_id')
                ->take(4)->get();

            $view->with(
                'popularCategories',
                $popularCategories
            );

        });


        View::composer('*', function ($view) {

            $recentProducts = \App\Models\Product::latest()
                ->where('status', 1)
                ->take(4)
                ->get();


            $view->with(
                'recentProducts',
                $recentProducts
            );

        });


        try {
            SmtpSetting::apply();
        } catch (\Exception $e) {
            // Table might not exist yet (fresh install before migration) — ignore silently
        }

    }
}
