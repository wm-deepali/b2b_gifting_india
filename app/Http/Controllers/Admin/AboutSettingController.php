<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSetting;
use Illuminate\Http\Request;

class AboutSettingController extends Controller
{
    public function edit()
    {
        $about = AboutSetting::first();

        return view('admin.about-settings.index', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'hero_title' => 'nullable|string|max:255',

            'discover_subtitle' => 'nullable|string|max:255',
            'discover_title' => 'nullable|string|max:255',
            'discover_para1' => 'nullable|string',
            'discover_para2' => 'nullable|string',
            'discover_button_text' => 'nullable|string|max:100',
            'discover_image' => 'nullable|image|max:2048',

            'tech_subtitle' => 'nullable|string|max:255',
            'tech_title' => 'nullable|string|max:255',
            'tech_description' => 'nullable|string',

            'tech_icon' => 'nullable|array',
            'tech_feature_title' => 'nullable|array',
            'tech_feature_desc' => 'nullable|array',

            'cta_title' => 'nullable|string|max:255',
            'cta_desc' => 'nullable|string',
            'cta_button_text' => 'nullable|string|max:100',

            'promise_subtitle' => 'nullable|string|max:255',
            'promise_title' => 'nullable|string|max:255',
            'promise_description' => 'nullable|string',

            'promise_icon' => 'nullable|array',
            'promise_card_title' => 'nullable|array',
            'promise_card_desc' => 'nullable|array',

            'stat_icon' => 'nullable|array',
            'stat_number' => 'nullable|array',
            'stat_label' => 'nullable|array',

            'vision_badge' => 'nullable|string|max:255',
            'vision_title' => 'nullable|string|max:255',
            'vision_desc' => 'nullable|string',
            'mission_badge' => 'nullable|string|max:255',
            'mission_title' => 'nullable|string|max:255',
            'mission_desc' => 'nullable|string',
        ]);

        $about = AboutSetting::first();

        if (!$about) {
            $about = new AboutSetting();
        }

        // Handle discover image upload
        if ($request->hasFile('discover_image')) {
            $validated['discover_image'] = $request->file('discover_image')->store('about', 'public');
        } else {
            unset($validated['discover_image']);
        }

        // Rebuild the repeatable groups from parallel arrays
        $techFeatures = [];
        foreach ((array) $request->tech_icon ?? [] as $i => $icon) {
            if (empty($icon) && empty($request->tech_feature_title[$i]) && empty($request->tech_feature_desc[$i])) {
                continue;
            }
            $techFeatures[] = [
                'icon' => $icon,
                'title' => $request->tech_feature_title[$i] ?? '',
                'desc' => $request->tech_feature_desc[$i] ?? '',
            ];
        }

        $promiseCards = [];
        foreach ((array) $request->promise_icon ?? [] as $i => $icon) {
            if (empty($icon) && empty($request->promise_card_title[$i]) && empty($request->promise_card_desc[$i])) {
                continue;
            }
            $promiseCards[] = [
                'icon' => $icon,
                'title' => $request->promise_card_title[$i] ?? '',
                'desc' => $request->promise_card_desc[$i] ?? '',
            ];
        }

        $stats = [];
        foreach ((array) $request->stat_icon ?? [] as $i => $icon) {
            if (empty($icon) && empty($request->stat_number[$i]) && empty($request->stat_label[$i])) {
                continue;
            }
            $stats[] = [
                'icon' => $icon,
                'number' => $request->stat_number[$i] ?? '',
                'label' => $request->stat_label[$i] ?? '',
            ];
        }

        // IMPORTANT: assign as plain PHP arrays, NOT json_encode()'d strings.
        // The AboutSetting model already casts these columns as 'array',
        // so Eloquent handles the JSON encoding on save automatically.
        // Manually json_encode()-ing here caused double-encoding (a JSON
        // string got encoded again), which corrupted the stored data.
        $validated['tech_features'] = $techFeatures;
        $validated['promise_cards'] = $promiseCards;
        $validated['stats'] = $stats;

        // Remove raw repeater input keys — they aren't table columns,
        // only the computed tech_features/promise_cards/stats arrays above should be saved.
        unset(
            $validated['tech_icon'],
            $validated['tech_feature_title'],
            $validated['tech_feature_desc'],
            $validated['promise_icon'],
            $validated['promise_card_title'],
            $validated['promise_card_desc'],
            $validated['stat_icon'],
            $validated['stat_number'],
            $validated['stat_label']
        );

        $about->fill($validated);
        $about->save();

        return redirect()
            ->route('admin.about-settings.edit')
            ->with('success', 'About Us page updated successfully.');
    }
}