<title>NurJourney - {{ $paket->nama_paket }}</title>
@include('layout.headerD')

<section class="detail-paket">
  <div class="detail-container">
    <div class="detail-header">
      <img src="{{ asset($paket->gambar) }}" alt="{{ $paket->nama_paket }}">
      <div class="detail-info">
        <h2>{{ $paket->nama_paket }}</h2>
        <p class="subtitle">{{ $paket->deskripsi }}</p>
        <div class="price-box">
          <span>Harga mulai dari</span>
          <h3>Rp {{ number_format($paket->harga,0,',','.') }}</h3>
        </div>
        <a href="/konsultasi" class="btn-daftar">Daftar Sekarang</a>
      </div>
    </div>

    <div class="detail-body">
      @if($paket->fasilitas)
        <h3>Fasilitas Termasuk</h3>
        <ul>
          @foreach(explode(',', $paket->fasilitas) as $item)
            <li>{{ $item }}</li>
          @endforeach
        </ul>
      @endif

      @if($paket->jadwal)
        <h3>Jadwal Keberangkatan</h3>
        <p>{{ $paket->jadwal }}</p>
      @endif
    </div>
  </div>
</section>

@include('layout.footer')
