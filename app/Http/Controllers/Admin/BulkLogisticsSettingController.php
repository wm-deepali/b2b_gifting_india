<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BulkLogisticsSetting;
use Illuminate\Http\Request;

class BulkLogisticsSettingController extends Controller
{
    public function edit()
    {
        $setting = BulkLogisticsSetting::current();

        return view('admin.bulk-logistics-settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'content' => 'nullable|string',
        ]);

        $setting = BulkLogisticsSetting::current();
        $setting->update($validated);

        return redirect()
            ->route('admin.bulk-logistics-settings.edit')
            ->with('success', 'Bulk Logistics default content updated successfully.');
    }
}