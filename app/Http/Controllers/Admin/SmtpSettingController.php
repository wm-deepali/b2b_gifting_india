<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SmtpSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SmtpSettingController extends Controller
{
    public function edit()
    {
        $smtp = SmtpSetting::first();

        return view('admin.smtp-settings.index', compact('smtp'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'mail_mailer' => 'required|string|max:50',
            'mail_host' => 'required|string|max:255',
            'mail_port' => 'required|string|max:10',
            'mail_username' => 'nullable|string|max:255',
            'mail_password' => 'nullable|string|max:255',
            'mail_encryption' => 'nullable|in:tls,ssl,',
            'mail_from_address' => 'required|email|max:255',
            'mail_from_name' => 'required|string|max:255',
            'admin_enquiry_email' => 'required|email|max:255',
        ]);

        $smtp = SmtpSetting::first();

        if (!$smtp) {
            $smtp = new SmtpSetting();
        }

        // Don't overwrite the saved password with a blank field
        // if the admin left it empty on this save (masked password UX).
        if (empty($validated['mail_password'])) {
            unset($validated['mail_password']);
        }

        $smtp->fill($validated);
        $smtp->save();

        // Apply immediately so a Test Email right after saving uses new values
        SmtpSetting::apply();

        return redirect()
            ->route('admin.smtp-settings.edit')
            ->with('success', 'SMTP settings updated successfully.');
    }

    public function sendTestEmail(Request $request)
    {
        $request->validate([
            'test_email' => 'required|email',
        ]);

        SmtpSetting::apply();

        try {
            Mail::raw('This is a test email from your SMTP settings page. If you received this, your SMTP configuration is working correctly.', function ($message) use ($request) {
                $message->to($request->test_email)
                    ->subject('SMTP Test Email');
            });

            return back()->with('success', 'Test email sent to ' . $request->test_email . '. Please check the inbox.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send test email: ' . $e->getMessage());
        }
    }
}