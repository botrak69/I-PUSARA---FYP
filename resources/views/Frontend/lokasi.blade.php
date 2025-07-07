@extends('Frontend.layout')

@section('title', 'Lokasi')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Lokasi Tanah Perkuburan Islam Bako</h2>
    <p class="text-center mb-4">
        Lokasi yang telah didaftarkan untuk pengebumian adalah seperti berikut:
    </p>

    <!-- Embedded Google Map -->
    <div class="ratio ratio-16x9">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19878.26725082346!2d110.44159054561933!3d1.6736211000000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31fbad28ed291475%3A0x265afd0cd16db859!2sTanah%20Perkuburan%20Islam%20Bako%20(TPIB)!5e1!3m2!1sen!2smy!4v1747145431608!5m2!1sen!2smy" 
            width="600" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>
@endsection
