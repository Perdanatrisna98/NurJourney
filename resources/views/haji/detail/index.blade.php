<title>NurJourney - Haji</title>
@include('layout.headerD')

<section class="detail-paket">
  <div class="detail-container">
    <div class="detail-header">
      <img src="{{ asset('image/hajiPlus.webp') }}" alt="Paket Haji Plus">
      <div class="detail-info">
        <h2>Haji Plus</h2>
        <p class="subtitle">Perjalanan ibadah dengan izin resmi pemerintah Indonesia</p>
        <div class="price-box">
          <span>Harga mulai dari</span>
          <h3>Rp 50.000.000</h3>
        </div>
        <a href="/konsultasi" class="btn-daftar">Daftar Sekarang</a>
      </div>
    </div>

    <div class="detail-body">
      <h3>Deskripsi Paket</h3>
      <p>
        Program Haji Plus menawarkan pengalaman ibadah haji dengan masa tunggu lebih singkat, fasilitas premium,
        serta bimbingan langsung oleh pembimbing berpengalaman. Peserta akan mendapatkan layanan visa resmi dari
        Kementerian Agama Republik Indonesia dan fasilitas hotel bintang lima di Makkah dan Madinah.
      </p>

      <h3>Fasilitas Termasuk</h3>
      <ul>
        <li>Tiket pesawat PP (Jakarta – Jeddah / Madinah)</li>
        <li>Hotel bintang 5 di Makkah dan Madinah</li>
        <li>Bus AC selama perjalanan</li>
        <li>Makan 3 kali sehari menu Indonesia</li>
        <li>Pembimbing ibadah berpengalaman</li>
        <li>Asuransi perjalanan & perlengkapan ibadah</li>
      </ul>

      <h3>Jadwal Keberangkatan</h3>
      <p>
        Keberangkatan reguler tersedia setiap musim haji sesuai jadwal resmi pemerintah Indonesia.
        Silakan hubungi admin kami untuk memastikan kuota dan tanggal keberangkatan.
      </p>
    </div>
  </div>
</section>

@include('layout.footer')