<title>NurJourney - Konsultasi</title>
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<!-- Konsultasi -->
<div class="konsultasi-section">
    <div class="konsultasi-container">
        <div class="image"></div>
        <div class="form">
            <h2>
                Rencanakan Perjalanan Bersama <span>NurJourney</span>, Suci Penuh Ketenangan.
            </h2>
            <p>
                Isi formulir konsultasi untuk mendapatkan informasi lebih lanjutl.
            </p>

            <form action="{{ route('konsultasi.store') }}" method="POST">
                @csrf
                <label for="panggilan">Panggilan</label>
                <select name="panggilan" id="panggilan" required>
                    <option value="">Pilih Panggilan</option>
                    <option value="bapak">Bapak</option>
                    <option value="ibu">Ibu</option>
                </select>

                <label for="nama">Nama Lengkap *</label>
                <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" required>

                <label for="wa">No WhatsApp *</label>
                <input type="text" name="wa" id="wa" placeholder="089123456789" required>

                <label for="pesan">Pesan</label>
                <textarea name="pesan" id="pesan" placeholder="Tulis pesan di sini..."></textarea>

                <button type="submit">Konsultasi Sekarang</button>
            </form>
        </div>
    </div>
</div>