@extends('Frontend.layout')

@section('title', 'Mengenai Kami')

@section('content')
<div class="container my-5 justify">
  <h1 class="text-center mb-4">Apa Itu I-PUSARA (TPIB)?</h1>
  <p style="text-align: justify;">
    I-PUSARA TPIB adalah sebuah platform komuniti untuk pengurusan dan bantuan pengebumian, 
    bertujuan memudahkan proses carian, pengurusan dan informasi berkaitan pusara secara digital. 
    TPIB merupakan singkatan bagi <strong>Tanah Perkuburan Islam Bako</strong>. 
    TPIB diwujudkan oleh <strong>Lembaga Amanah Masjid Kampung Bako</strong> 
    untuk memberi kemudahan yang terbaik kepada penduduk kampung dalam aspek pengurusan jenazah. 
    Tapak perkuburan yang sedia ada tidak sesuai lagi digunakan untuk pengebumian kerana terletak di lereng bukit dan struktur tanah yang kurang selamat. 
    Ekoran daripada itu, <strong>Kerajaan Negeri Sarawak</strong> telah meluluskan tanah bagi pembinaan kawasan perkuburan Islam yang baharu. 
    Tanah perkuburan ini dibangun dan diuruskan oleh <strong>Lembaga Amanah Masjid Kampung Bako</strong> 
    dan tanah perkuburan yang baharu ini berkonsepkan kubur dalam taman.
  </p>

  <div class="row mt-5">
    <div class="col-md-6">
      <h4>Misi Kami</h4>
      <p>
        <p style="text-align: justify;">
        I-PUSARA (TPIB) berusaha untuk menyediakan platform yang sistematik dan mudah diakses oleh masyarakat 
        bagi membantu dalam pengurusan pengebumian dan pencarian lokasi pusara sekaligus menyediakan kemudahan lengkap, 
        pengurusan mantap dan persekitaran menceriakan.
      </p>
    </div>
    <div class="col-md-6">
      <h4>Visi Kami</h4>
      <p>
        <p style="text-align: justify;">
        Menjadi platform digital utama bagi komuniti dalam urusan pengebumian, mempercepatkan akses kepada maklumat 
        berkaitan pusara serta menyediakan bantuan kepada waris dan pihak berkepentingan di samping 
        tanah perkuburan Islam berkonsepkan kubur dalam taman.
      </p>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-md-6">
      <h4>Peranan dan Tanggungjawab</h4>
      <p>
        <p style="text-align: justify;">
        Pengurusan TPIB menyediakan liang lahad untuk pengebumian jenazah. Proses pengebumian akan diuruskan sehingga selesai. 
        Pihak pengurusan bertanggungjawab untuk menyelenggara tanah perkuburan agar sentiasa bersih, teratur dan terjaga. 
        Tapak perkuburan Islam ini berkonsepkan kubur dalam taman. 
        Pihak pengurusan telah menyediakan napor mengikut bentuk dan saiz yang telah ditetapkan dalam garis panduan oleh Jabatan Mufti Negeri Sarawak. 
        Untuk memastikan maklumat pengurusan jenazah dilaksanakan dengan baik dan teratur, pihak pengurusan menyediakan perkhidmatan pendaftaran secara atas talian.
      </p>
    </div>
    <div class="col-md-6">
      <h4>Kemudahan</h4>
      <ul>
        <p style="text-align: justify;">
        <li>Rumah wakaf yang menempatkan pejabat pengurusan dan pelbagai kemudahan lain</li>
        <li>Surau dan tempat memandikan jenazah</li>
        <li>Pondok rehat (2 buah)</li>
        <li>Gazebo (3 buah)</li>
        <li>Batu nisan dan napor</li>
        <li>Van jenazah</li>
        <li>Jentera penggali (excavator)</li>
        <li>Tanah perkuburan mengikut jantina</li>
        <li>Kemudahan elektrik untuk pengebumian waktu malam</li>
      </ul>
    </div>
  </div>
  <!-- Image Section at Bottom -->
  <div class="mt-5">
    <img src="{{ asset('picture/LTPIB.jpg') }}" alt="Tanah Perkuburan Islam Bako" class="img-fluid rounded shadow">
  </div>
</div>
@endsection
