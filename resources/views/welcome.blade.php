@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    <title>Sistem Pendukung Keputusan | Pemilihan Tablet</title>
  </head>
  <body>
    <header class="section__container header__container">
      <div class="header__content">
        <span class="bg__blur"></span>
        <span class="bg__blur header__blur"></span>
        <h4>SISTEM PENDUKUNG KEPUTUSAN</h4>
        <h1><span>PILIH</span> TABLET TERBAIK</h1>
        <p>
          Temukan tablet yang paling sesuai dengan kebutuhan Anda melalui
          sistem pendukung keputusan kami. Kami membantu Anda membuat keputusan
          terbaik berdasarkan berbagai kriteria.
        </p>
        <button class="btn" onclick="window.location.href='{{ route('login') }}'">Mulai Sekarang</button>
      </div>
      <div class="header__image">
        <img src="{{ asset('assets/tablet.png') }}" alt="header" />
      </div>
    </header>

    <section class="section__container explore__container">
      <div class="explore__header">
        <h2 class="section__header">FITUR-FITUR UTAMA</h2>
        <div class="explore__nav">
          <span><i class="ri-arrow-left-line"></i></span>
          <span><i class="ri-arrow-right-line"></i></span>
        </div>
      </div>
      <div class="explore__grid">
        <div class="explore__card">
          <span><i class="ri-user-settings-line"></i></span>
          <h4>Edit Profil</h4>
          <p>
            Sesuaikan profil pengguna Anda dengan mudah melalui fitur edit profil kami.
          </p>
          <a href="#">Mulai Sekarang <i class="ri-arrow-right-line"></i></a>
        </div>
        <div class="explore__card">
          <span><i class="ri-calculator-line"></i></span>
          <h4>Perhitungan TOPSIS</h4>
          <p>
            Menggunakan metode TOPSIS untuk memberikan rekomendasi berdasarkan
            peringkat tertinggi sesuai kriteria yang dipilih.
          </p>
          <a href="#">Mulai Sekarang <i class="ri-arrow-right-line"></i></a>
        </div>
        <div class="explore__card">
          <span><i class="ri-user-add-line"></i></span>
          <h4>Penentuan Alternatif dan Kriteria</h4>
          <p>
            Anda dapat menentukan alternatif dan kriteria sesuai dengan keinginan
            untuk menyesuaikan analisis dengan kebutuhan Anda.
          </p>
          <a href="#">Mulai Sekarang <i class="ri-arrow-right-line"></i></a>
        </div>
        <div class="explore__card">
          <span><i class="ri-bar-chart-line"></i></span>
          <h4>Perangkingan</h4>
          <p>
            Lihat peringkat alternatif berdasarkan hasil perhitungan untuk membuat keputusan yang lebih baik.
          </p>
          <a href="#">Mulai Sekarang <i class="ri-arrow-right-line"></i></a>
        </div>
      </div>
    </section>
    
    <section class="section__container join__container">
      <h2 class="section__header">Cara penggunaan</h2>
      <p class="section__subheader">
        Panduan singkat untuk memulai dengan sistem kami.
      </p>
      <div class="join__image">
        <img src="{{ asset('assets/tablet_wp.jpg') }}" alt="Join" />
        <div class="join__grid">
          <div class="join__card">
            <span><i class="ri-user-star-fill"></i></span>
            <div class="join__card__content">
              <h4>Alternatif dan Kriteria</h4>
              <p>Tambahkan alternatif dan kriteria yang anda inginkan</p>
            </div>
          </div>
          <div class="join__card">
            <span><i class="ri-user-add-line"></i></span>
            <div class="join__card__content">
              <h4>Nilai Alternative</h4>
              <p>Tambahkan nilai alternatif</p>
            </div>
          </div>
          <div class="join__card">
            <span><i class="ri-building-line"></i></span>
            <div class="join__card__content">
              <h4>Perhitungan dan Hasil</h4>
              <p>Lakukan perhitungan topsis dan lihatlah hasil perangkingannya</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Daftar Tablet Section -->
    <section class="section__container tablets__container">
      <h2 class="section__header">Daftar Tablet</h2>
      <div class="tablets__grid">
        <div class="tablet__card">
          <img src="{{ asset('assets/samsung.jpg') }}" alt="Samsung Tab S8">
          <div class="tablet__details">
            <h4>Samsung Tab S9</h4>
          </div>
        </div>
        <div class="tablet__card">
          <img src="{{ asset('assets/huawei.jpg') }}" alt="Huawei Matepad">
          <div class="tablet__details">
            <h4>Huawei Matepad</h4>
          </div>
        </div>
        <div class="tablet__card">
          <img src="{{ asset('assets/xiaomi.jpg') }}" alt="Xiaomi Pad">
          <div class="tablet__details">
            <h4>Xiaomi Pad</h4>
          </div>
        </div>
        <div class="tablet__card">
          <img src="{{ asset('assets/apple.jpg') }}" alt="Apple iPad Pro">
          <div class="tablet__details">
            <h4>Apple iPad Pro</h4>
          </div>
        </div>
        <div class="tablet__card">
          <img src="{{ asset('assets/oppo.jpg') }}" alt="Oppo Pad Air">
          <div class="tablet__details">
            <h4>Oppo Pad Air</h4>
          </div>
        </div>
        <div class="tablet__card">
          <img src="{{ asset('assets/google.jpg') }}" alt="Google Pixel Tab">
          <div class="tablet__details">
            <h4>Google Pixel Tab</h4>
          </div>
        </div>
        <div class="tablet__card">
          <img src="{{ asset('assets/samsung_s8.jpg') }}" alt="Google Pixel Tab">
          <div class="tablet__details">
            <h4>Samsung Galaxy S8</h4>
          </div>
        </div>
        <div class="tablet__card">
          <img src="{{ asset('assets/ipad.jpg') }}" alt="Google Pixel Tab">
          <div class="tablet__details">
            <h4>Apple Ipad</h4>
          </div>
        </div>
      </div>
    </section>
    
    <section class="section__container class__container">
      <div class="class__image">
        <span class="bg__blur"></span>
        <img src="{{ asset('assets/tablet01.jpg') }}" alt="class" class="class__img-1" />
      </div>
      <div class="class__content">
        <h2 class="section__header">TENTANG WEBSITE </h2>
        <p>
          Website ini adalah sistem pendukung keputusan yang dirancang untuk
          membantu Anda dalam memilih tablet terbaik sesuai dengan kebutuhan
          Anda. Dengan menggunakan metode TOPSIS, kami memberikan rekomendasi
          yang akurat berdasarkan berbagai kriteria yang dapat disesuaikan
          dengan preferensi Anda. Kami berharap website ini dapat mempermudah
          proses pengambilan keputusan Anda dalam membeli tablet.
        </p>
      </div>
    </section>

    <section class="section__container faq__container">
      <h2 class="section__header">FAQ</h2>
      <p class="section__subheader">
        Pertanyaan yang sering diajukan
      </p>
      <div class="faq__grid">
        <div class="faq__card">
          <div class="faq__card__content">
            <h5>Apa itu sistem ini?</h5>
            <p class="faq__answer">Sistem ini membantu Anda memilih tablet terbaik berdasarkan kebutuhan Anda menggunakan metode TOPSIS.</p>
          </div>
        </div>
        <div class="faq__card">
          <div class="faq__card__content">
            <h5>Bagaimana metode TOPSIS bekerja?</h5>
            <p class="faq__answer">TOPSIS merangking alternatif berdasarkan kriteria yang dipilih untuk memberikan rekomendasi terbaik.</p>
          </div>
        </div>
        <div class="faq__card">
          <div class="faq__card__content">
            <h5>Apakah saya bisa menyesuaikan kriteria?</h5>
            <p class="faq__answer">Ya, Anda dapat menentukan alternatif dan kriteria sesuai dengan preferensi Anda.</p>
          </div>
        </div>
        <div class="faq__card">
          <div class="faq__card__content">
            <h5>Apakah ada dukungan yang tersedia?</h5>
            <p class="faq__answer">Ya, tim dukungan kami tersedia untuk membantu Anda dengan pertanyaan atau masalah yang Anda hadapi.</p>
          </div>
        </div>
      </div>
    </section>

    <footer class="section__container footer__container">
      <span class="bg__blur"></span>
      <span class="bg__blur footer__blur"></span>
      <div class="footer__col">
        <p>
          Ambil langkah terbaikmu! untuk memilih tablet impianmu!
        </p>
        <div class="footer__socials">
          <a href="#"><i class="ri-github-fill"></i></a>
          <a href="#"><i class="ri-instagram-line"></i></a>
          <a href="#"><i class="ri-twitter-fill"></i></a>
        </div>
      </div>
      <div class="footer__col">
        <h4>Fitur</h4>
        <a href="#">Kriteria</a>
        <a href="#">Alternative</a>
        <a href="#">Topsis</a>
        <a href="#">Ranking</a>
      </div>
      <div class="footer__col">
        <h4>About Us</h4>
        <a href="#">Website</a>
        <a href="#">Careers</a>
      </div>
      <div class="footer__col">
        <h4>Procedure</h4>
        <a href="#">Cara Penggunaan</a>
        <a href="#">FAQ</a>
      </div>
    </footer>
    <script src="{{ asset('assets/js/script.js') }}"></script>
  </body>
</html>
@endsection
