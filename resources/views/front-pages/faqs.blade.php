@extends('layouts.app')

@section('content')

<section class="py-16 md:py-24 bg-gray-50">
    <div class="max-w-4xl mx-auto px-6">

        <!-- Header -->
        <div class="text-center mb-14">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Frequently Asked Questions
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Find quick answers to common questions about corporate gifting with B2B Gifts India
            </p>
        </div>

        <!-- FAQ Accordion -->
        <div class="space-y-5">

            <!-- FAQ 1 -->
            <div class="faq-card">
                <button class="faq-question active" onclick="toggleFAQ(this)">
                    <span>What is the minimum order quantity for corporate gifts?</span>
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer open">
                    Our minimum order quantity is 50 pieces per design. However, for customized gifts we can discuss lower quantities depending on the product.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="faq-card">
                <button class="faq-question" onclick="toggleFAQ(this)">
                    <span>How long does it take to deliver bulk corporate orders?</span>
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    Standard delivery takes 7-12 working days after artwork approval. For urgent requirements, we offer express delivery in 4-6 days with additional charges.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="faq-card">
                <button class="faq-question" onclick="toggleFAQ(this)">
                    <span>Do you provide customization and branding services?</span>
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    Yes, we offer multiple customization options including laser engraving, screen printing, UV printing, embroidery, and debossing on almost all products.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="faq-card">
                <button class="faq-question" onclick="toggleFAQ(this)">
                    <span>Can I get a sample before placing a bulk order?</span>
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    Absolutely! We provide physical samples at a nominal cost. Sample charges are usually adjusted in the bulk order.
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="faq-card">
                <button class="faq-question" onclick="toggleFAQ(this)">
                    <span>Do you offer eco-friendly and sustainable gift options?</span>
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    Yes, we have a wide range of eco-friendly gifts made from bamboo, recycled plastic, organic cotton, and jute. These are very popular among corporates focusing on sustainability.
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="faq-card">
                <button class="faq-question" onclick="toggleFAQ(this)">
                    <span>What is your payment and return policy?</span>
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    We accept bank transfer, UPI, and major credit/debit cards. 50% advance is required for customized orders. Returns are accepted only in case of manufacturing defects within 7 days of delivery.
                </div>
            </div>

        </div>

        <!-- Still have questions -->
        <div class="mt-16 text-center bg-white rounded-3xl p-10 shadow-sm">
            <h3 class="text-2xl font-semibold mb-3">Still have questions?</h3>
            <p class="text-gray-600 mb-6">Our team is happy to help you with any queries regarding corporate gifting.</p>
            <a href="#" 
               class="inline-block bg-gradient-to-r from-[#f4a261] to-[#e07a5f] text-white px-10 py-4 rounded-2xl font-semibold hover:shadow-lg transition-all">
                Contact Us Now
            </a>
        </div>

    </div>
</section>

<script>
    function toggleFAQ(button) {
        const answer = button.nextElementSibling;
        const isOpen = answer.classList.contains('open');
        const allQuestions = document.querySelectorAll('.faq-question');

        // Close all other FAQs
        allQuestions.forEach(q => {
            if (q !== button) {
                q.classList.remove('active');
                q.nextElementSibling.classList.remove('open');
            }
        });

        // Toggle current FAQ
        if (isOpen) {
            button.classList.remove('active');
            answer.classList.remove('open');
        } else {
            button.classList.add('active');
            answer.classList.add('open');
        }
    }

    // Optional: Open first FAQ by default
    window.onload = function() {
        const firstButton = document.querySelector('.faq-question');
        if (firstButton) {
            firstButton.classList.add('active');
            firstButton.nextElementSibling.classList.add('open');
        }
    };
</script>



@endsection