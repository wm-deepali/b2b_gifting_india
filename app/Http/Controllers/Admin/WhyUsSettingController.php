<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyUsSetting;
use Illuminate\Http\Request;

class WhyUsSettingController extends Controller
{
    public function edit()
    {
        $whyUs = WhyUsSetting::first();

        return view('admin.why-us-settings.index', compact('whyUs'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'hero_title' => 'nullable|string|max:255',

            'features_subtitle' => 'nullable|string|max:255',
            'features_title' => 'nullable|string|max:255',
            'features_description' => 'nullable|string',

            'feature_icon' => 'nullable|array',
            'feature_title' => 'nullable|array',
            'feature_desc' => 'nullable|array',

            'cta_subtitle' => 'nullable|string|max:255',
            'cta_title' => 'nullable|string|max:255',
            'cta_title_highlight' => 'nullable|string|max:255',
            'cta_desc' => 'nullable|string',
            'cta_primary_button_text' => 'nullable|string|max:100',
            'cta_primary_button_link' => 'nullable|string|max:255',
            'cta_secondary_button_text' => 'nullable|string|max:100',
        ]);

        $whyUs = WhyUsSetting::first();

        if (!$whyUs) {
            $whyUs = new WhyUsSetting();
        }

        // Rebuild the repeatable features JSON from parallel arrays
        $features = [];
        foreach ((array) $request->feature_icon ?? [] as $i => $icon) {
            if (empty($icon) && empty($request->feature_title[$i]) && empty($request->feature_desc[$i])) {
                continue;
            }
            $features[] = [
                'icon' => $icon,
                'title' => $request->feature_title[$i] ?? '',
                'desc' => $request->feature_desc[$i] ?? '',
            ];
        }

        $validated['features'] = $features;

        // Remove raw repeater input keys — they aren't table columns
        unset(
            $validated['feature_icon'],
            $validated['feature_title'],
            $validated['feature_desc']
        );

        $whyUs->fill($validated);
        $whyUs->save();

        return redirect()
            ->route('admin.why-us-settings.edit')
            ->with('success', 'Why Choose Us page updated successfully.');
    }
}