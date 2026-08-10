<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WhyUsSettingSeeder extends Seeder
{
    public function run(): void
    {
        if (DB::table('why_us_settings')->exists()) {
            return;
        }

        DB::table('why_us_settings')->insert([
            'hero_title' => 'Why Choose Us',

            'features_subtitle' => 'Our Value Proposition',
            'features_title' => 'Why Choose B2B Gifts India',
            'features_description' => 'From premium product selection to seamless customization and reliable delivery, we provide end-to-end corporate gifting solutions designed to save your time and elevate your brand.',
            'features' => json_encode([
                [
                    'icon' => 'fa-solid fa-palette',
                    'title' => 'Premium Quality & Customization',
                    'desc' => 'We offer meticulously curated products that meet high-quality standards, complemented by advanced customization options such as laser engraving, precision printing, and bespoke branding solutions.',
                ],
                [
                    'icon' => 'fa-solid fa-truck-fast',
                    'title' => 'Efficient & Reliable Delivery',
                    'desc' => 'Our streamlined logistics ensure timely and dependable delivery across India, with the flexibility to accommodate urgent requirements through expedited processing.',
                ],
                [
                    'icon' => 'fa-solid fa-leaf',
                    'title' => 'Sustainable Gifting Solutions',
                    'desc' => 'We offer a thoughtfully curated range of eco-conscious products crafted from sustainable materials, enabling your brand to align with responsible and environmentally mindful practices.',
                ],
                [
                    'icon' => 'fa-solid fa-tags',
                    'title' => 'Cost-Effective Value',
                    'desc' => 'We deliver optimal value through competitive pricing structures, ensuring high-quality gifting solutions without compromising on standards, especially for bulk and recurring requirements.',
                ],
                [
                    'icon' => 'fa-solid fa-certificate',
                    'title' => 'Quality Assurance & Support',
                    'desc' => 'Every order undergoes strict quality checks, supported by a responsive team committed to addressing concerns promptly and ensuring a smooth client experience.',
                ],
                [
                    'icon' => 'fa-solid fa-handshake-angle',
                    'title' => 'Dedicated Corporate Assistance',
                    'desc' => 'We provide end-to-end support with structured coordination, including requirement consultation, artwork approvals, and seamless execution from product selection to final delivery.',
                ],
            ]),

            'cta_subtitle' => 'Next Steps',
            'cta_title' => 'Ready to Gift',
            'cta_title_highlight' => 'Smarter?',
            'cta_desc' => 'Let us help you choose the perfect corporate gifts that reflect your brand values and strengthen your relationships.',
            'cta_primary_button_text' => 'Browse Our Collection',
            'cta_primary_button_link' => 'product_details.html',
            'cta_secondary_button_text' => 'Get a Custom Quote',

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}