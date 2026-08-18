<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeSliderController extends Controller
{
    public function index()
    {
        $sliders = HomeSlider::orderBy('sort_order')
            ->latest()
            ->paginate(10);

        return view('admin.home.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.home.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'desktop_image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'mobile_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'link' => [
                'nullable',
                'url'
            ],
            'sort_order' => [
                'nullable',
                'integer',
                'min:0'
            ],
            'status' => [
                'required',
                'in:0,1'
            ]
        ]);

        $desktopImage = null;
        if ($request->hasFile('desktop_image')) {
            $desktopImage = $request->file('desktop_image')
                ->store('home-sliders', 'public');
        }

        $mobileImage = null;
        if ($request->hasFile('mobile_image')) {
            $mobileImage = $request->file('mobile_image')
                ->store('home-sliders', 'public');
        }

        HomeSlider::create([
            'desktop_image' => $desktopImage,
            'mobile_image' => $mobileImage,
            'link' => $request->link,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status
        ]);

        return redirect()
            ->route('admin.home.sliders.index')
            ->with('success', 'Slider created successfully.');
    }

    public function edit($id)
    {
        $slider = HomeSlider::findOrFail($id);

        return view(
            'admin.home.sliders.edit',
            compact('slider')
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'desktop_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'mobile_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'link' => [
                'nullable',
                'url'
            ],
            'sort_order' => [
                'nullable',
                'integer',
                'min:0'
            ],
            'status' => [
                'required',
                'in:0,1'
            ]
        ]);

        $slider = HomeSlider::findOrFail($id);

        $desktopImage = $slider->desktop_image;
        if ($request->hasFile('desktop_image')) {
            if (
                $slider->desktop_image &&
                Storage::disk('public')->exists($slider->desktop_image)
            ) {
                Storage::disk('public')->delete($slider->desktop_image);
            }
            $desktopImage = $request->file('desktop_image')
                ->store('home-sliders', 'public');
        }

        $mobileImage = $slider->mobile_image;
        if ($request->hasFile('mobile_image')) {
            if (
                $slider->mobile_image &&
                Storage::disk('public')->exists($slider->mobile_image)
            ) {
                Storage::disk('public')->delete($slider->mobile_image);
            }
            $mobileImage = $request->file('mobile_image')
                ->store('home-sliders', 'public');
        }

        $slider->update([
            'desktop_image' => $desktopImage,
            'mobile_image' => $mobileImage,
            'link' => $request->link,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status
        ]);

        return redirect()
            ->route('admin.home.sliders.index')
            ->with('success', 'Slider updated successfully.');
    }

    public function destroy($id)
    {
        $slider = HomeSlider::findOrFail($id);

        if (
            $slider->desktop_image &&
            Storage::disk('public')->exists($slider->desktop_image)
        ) {
            Storage::disk('public')->delete($slider->desktop_image);
        }

        if (
            $slider->mobile_image &&
            Storage::disk('public')->exists($slider->mobile_image)
        ) {
            Storage::disk('public')->delete($slider->mobile_image);
        }

        $slider->delete();

        return response()->json([
            'message' => 'Slider deleted successfully.'
        ]);
    }
}