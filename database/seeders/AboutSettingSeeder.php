<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSettingSeeder extends Seeder
{
    public function run(): void
    {
        // Avoid duplicate rows if seeder runs more than once
        if (DB::table('about_settings')->exists()) {
            return;
        }

        DB::table('about_settings')->insert([
            'hero_title' => 'About',

            'discover_subtitle' => 'Spreading Joy Since 5+ Years',
            'discover_title' => 'Discover B2B Gifts India & Our Giftech Platform',
            'discover_para1' => "Our Giftech platform provides access to the next level of corporate gifting. Sharing a successful journey of over 5 years, we've been spreading joy and fostering connections through thoughtfully chosen Gifts.",
            'discover_para2' => 'Our goal is to offer you the finest selection of options that cater to your specific corporate needs for any occasion. We will closely collaborate with you to gain a comprehensive understanding of your choices, budget, and timelines.',
            'discover_button_text' => 'Get Started',
            'discover_image' => 'assets/img/corporate/welcome_kit_1778668006890.webp',

            'tech_subtitle' => 'Innovative Gifting Ecosystem',
            'tech_title' => 'Elevate Your Corporate Gifting Experience',
            'tech_description' => 'We bridge premium luxury craftsmanship with cutting-edge digital curation. Discover our tech-forward corporate gifting philosophy.',
            'tech_features' => json_encode([
                [
                    'icon' => 'fa-solid fa-microchip',
                    'title' => 'Cutting-Edge Gifting Tech',
                    'desc' => 'We, as a Gift-Tech company, distinguish ourselves from others through our cutting-edge technological tools, including an E-commerce website, CRM system, and well-defined processes and policies. These elements shape our unique approach, vision, and mission, ensuring customer satisfaction, exceptional service, and a strong brand value.',
                ],
                [
                    'icon' => 'fa-solid fa-tags',
                    'title' => 'Vast Catalog & Brand Network',
                    'desc' => 'We efficiently handle a wide range of over 5000+ products & serving a client base of over 400 plus corporate and established corporate partnerships with more than 150 national and international brands across 18 major categories and 100 subcategories.',
                ],
                [
                    'icon' => 'fa-solid fa-heart-pulse',
                    'title' => 'Empowering Local Artisans',
                    'desc' => 'To promote local trade, support local artisans, and contribute to the growth of the Indian economy, the majority of our products are manufactured in India. We are delighted to offer an exciting opportunity for brand partnerships.',
                ],
            ]),

            'cta_title' => 'Reach us for extraordinary gifting experience.',
            'cta_desc' => 'Our design curators are ready to help you launch your next campaign.',
            'cta_button_text' => 'Get a Custom Proposal',

            'promise_subtitle' => 'Commitment to Distinction',
            'promise_title' => 'Our Brand Promise',
            'promise_description' => 'We go beyond gifting — we deliver experiences that strengthen relationships, elevate your brand, and create lasting impressions.',
            'promise_cards' => json_encode([
                [
                    'icon' => 'fa-solid fa-wand-magic-sparkles',
                    'title' => 'Premium Quality',
                    'desc' => 'Carefully curated, high-quality products that reflect your brand standards and leave a lasting impression.',
                ],
                [
                    'icon' => 'fa-solid fa-palette',
                    'title' => 'Creative Customization',
                    'desc' => 'Tailored branding solutions including logo printing, engraving, and premium packaging to make every gift uniquely yours.',
                ],
                [
                    'icon' => 'fa-solid fa-handshake-angle',
                    'title' => 'Exceptional Service',
                    'desc' => 'End-to-end support from consultation to delivery, ensuring a smooth, reliable, and hassle-free gifting experience.',
                ],
            ]),

            'stats' => json_encode([
                ['icon' => 'fa-solid fa-handshake', 'number' => '500+', 'label' => 'Happy Corporate Clients'],
                ['icon' => 'fa-solid fa-gift', 'number' => '1,25,000+', 'label' => 'Gifts Delivered'],
                ['icon' => 'fa-solid fa-crown', 'number' => '700+', 'label' => 'Premium Products'],
                ['icon' => 'fa-solid fa-network-wired', 'number' => '100', 'label' => 'Partners / Vendors'],
            ]),

            'vision_badge' => 'Our Vision',
            'vision_title' => 'To Redefine Corporate Gifting',
            'vision_desc' => 'To redefine corporate gifting by making it more meaningful, personalized, and result-driven — helping businesses create real impact through every gift they share.',

            'mission_badge' => 'Our Mission',
            'mission_title' => 'Delivering High-Quality Customization',
            'mission_desc' => "To provide reliable, high-quality, and customized gifting solutions with seamless execution — ensuring every order reflects our client's brand and delivers a smooth, hassle-free experience from start to finish.",

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}