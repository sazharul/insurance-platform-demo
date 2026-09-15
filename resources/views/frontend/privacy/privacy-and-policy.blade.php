@extends('frontend.layouts.master')
@section('title', 'Privacy & Policy')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">Privacy & Policy</h2>
                <h6 class="text-center mt-3"><span class="text-success fw-bold">Privacy & Policy</span></h6>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <p><strong>Portfolio demonstration notice.</strong> CoverSure is a fictional brand used in an independent portfolio demo for hiring review. This is not a production insurer website.</p>

                    <h4>Introduction</h4>
                    <p>
                        This demo platform may collect information you enter while testing calculators, forms, and checkout flows locally.
                        Data is used only to demonstrate application behavior. Do not submit real personal, financial, or insurance information in this demo environment.
                    </p>

                    <h4>Information we may collect in the demo</h4>
                    <ul>
                        <li>Contact details you type into demo forms (name, email, phone)</li>
                        <li>Calculator inputs used to generate sample quotes</li>
                        <li>Session and authentication data for demo accounts</li>
                    </ul>

                    <h4>How demo data is used</h4>
                    <p>
                        Demo data is stored locally in your development or Docker environment. It is not transmitted to any production insurer,
                        payment provider, or third-party service unless you explicitly configure integrations beyond demo mode.
                    </p>

                    <h4>Third-party services</h4>
                    <p>
                        In <code>DEMO_MODE</code>, payment and SMS integrations are stubbed. No real payment gateway credentials are required or used.
                    </p>

                    <h4>Contact</h4>
                    <p>
                        For questions about this portfolio demo, visit
                        <a href="https://azharulislamsohan.com/legal" target="_blank" rel="noreferrer">azharulislamsohan.com/legal</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
