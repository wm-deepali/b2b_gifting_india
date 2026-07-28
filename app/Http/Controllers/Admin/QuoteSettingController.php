<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\QuoteSetting;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class QuoteSettingController extends Controller
{
    public function index()
    {
        $quoteSetting = QuoteSetting::first();
        $states = State::orderBy('name')->get();

        $cities = $quoteSetting?->state_id
            ? City::where('state_id', $quoteSetting->state_id)->orderBy('name')->get()
            : collect();

        return view('admin.quote-settings.index', compact('quoteSetting', 'states', 'cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_logo'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'company_name'          => 'nullable|string|max:255',
            'company_introduction'  => 'nullable|string',
            'address'               => 'nullable|string|max:255',
            'state_id'              => 'nullable|exists:states,id',
            'city_id'               => 'nullable|exists:cities,id',
            'pincode'               => 'nullable|string|max:10',
            'email'                 => 'nullable|email|max:255',
            'phone'                 => 'nullable|string|max:20',
            'website'               => 'nullable|string|max:255',
            'gst_number'            => 'nullable|string|max:20',
            'id_prefix'             => 'nullable|string|max:20',
            'id_padding_length'     => 'nullable|integer|min:1|max:10',
            'terms_conditions'      => 'nullable|string',
        ]);

        $quoteSetting = QuoteSetting::first();

        $data = $request->except('company_logo', '_token');

        if ($request->hasFile('company_logo')) {

            // Delete old logo
            if (!empty($quoteSetting?->company_logo)) {
                $oldPath = public_path('storage/' . $quoteSetting->company_logo);

                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            // Store new logo
            $data['company_logo'] = $request->file('company_logo')->store('quote-settings', 'public');
        }

        QuoteSetting::updateOrCreate(
            ['id' => $quoteSetting?->id ?? 1],
            $data
        );

        return redirect()
            ->route('admin.quote-settings.index')
            ->with('success', 'Quote Settings updated successfully.');
    }

    public function getCitiesByState($state_id)
    {
        $cities = City::where('state_id', $state_id)
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json($cities);
    }
}