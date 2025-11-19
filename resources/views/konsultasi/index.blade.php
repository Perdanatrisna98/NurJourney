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

            <for>
                <label for="panggilan">Panggilan</label>
                <select id="panggilan" required>
                    <option value="">Pilih Panggilan</option>
                    <option value="bapak">Bapak</option>
                    <option value="ibu">Ibu</option>
                </select>

                <label for="nama">Nama Lengkap *</label>
                <input type="text" name="" id="nama" placeholder="Nama Lengkap" required>
                <label for="wa">No WhatsApp *</label>
                <input type="text" name="" id="wa" placeholder="089123456789" required>
                <label for="pesa">Pesan</label>
                <textarea name="" id="pesan" placeholder="Tulis pesan di sini..."></textarea>

                <button type="submit">Konsultasi Sekarang</button>
            </for>
        </div>
    </div>
</div>