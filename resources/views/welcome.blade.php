@include('layout.header')

<!-- Hero -->
<section class="hero" id="beranda">
    <p>
        <i class="fa-regular fa-thumbs-up"></i> <span class="quote">Dipercaya 100.000+ Jamaah</span>
    </p>
    <h1>
        Travel <span>Haji, Umroh</span> dan <span>Wisata Halal</span><br> Terbaik dan Nyaman
    </h1>
    <p class="quote">
        “Ikutkanlah umroh kepada haji, karena keduanya menghilangkan kemiskinan dan dosa-dosa sebagaimana pembakaran menghilangkan karat pada besi, emas, dan perak. Sementara tidak ada pahala bagi haji yang mabrur kecuali surga.” (HR. An Nasai, Tirmidzi dan Ahmad)
    </p>
    <a href="#paket" class="btn">Lihat Paket</a>
</section>

<!-- Modal Promo -->
<div class="modal-overlay" id="promoModal">
    <div class="modal" data-aos="zoom-in" data-aos-duration="700">
        <div class="modal-image">
            <img src="{{ asset('image/modal.jpg') }}" alt="Promo">
        </div>
        <div class="modal-content">
            <div class="modal-close" id="closeModal">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <small class="modal-label">Penawaran Spesial</small>
            <h3>Jangan Lewatkan Penawaran Terbatas!</h3>
            <p class="modal-desc">
                Raih ketenangan hati, ibadah, lebih nyaman, bersama NurJourney
            </p>
            <div class="modal-offer">
                DP Mulai dari Rp 1.000.000
            </div>
            <div class="modal-footer">
                <button class="btn-konsultasi-offer" onclick="window.loaction.href='/konsultasi'">Konsultasi</button>
                <small class="modal-terms"><span style="color:red;">*</span>S&K Berlaku</small>
            </div>
        </div>
    </div>
</div>

<!-- About -->
<section class="why" data-aos="fade-up" data-aos-duration="900">
    <h2>Mengapa memilih NurJourney?</h2>
    <p class="why-desc">
        Kami menyediakan pengalaman ibadah haji yang nyaman, terpercaya, dan penuh makna. Dengan layanan lengkap, Anda bisa fokus beribadah tanpa khawatir.
    </p>

    <div class="why-cards">
        <!-- 1 -->
        <div class="card" data-aos="fade-right">
            <div class="icon">
                <i class="fa-solid fa-user-shield"></i>
            </div>
            <h3>Terpercaya</h3>
            <p>Kami sudah berpengalaman melayani ribuan jamaah dengan rating tinggi.</p>
        </div>

        <!-- 2 -->
        <div class="card" data-aos="zoom-in">
            <div class="icon">
                <i class="fa-solid fa-plane-departure"></i>
            </div>
            <h3>Fasilitas Premium</h3>
            <p>Akomodasi dan transportasi terbaik demi kenyamanan ibadah Anda.</p>
        </div>

        <!-- 3 -->
        <div class="card" data-aos="fade-left">
            <div class="icon">
                <i class="fa-solid fa-wallet"></i>
            </div>
            <h3>Harga Terjangkau</h3>
            <p>Paket lengkap dengan harga yang bersaing dan transparan.</p>
        </div>
    </div>
</section>

<!-- Paket -->
<section class="pilihan-paket" id="paket">
    <div class="paket-container" data-aos="fade-up" data-aos-duration="900">
        <h2>Pilihan Paket</h2>
        <p>
            Pilih paket Umroh, Haji atau Wisata Halal sesuai impian Anda.
        </p>

        <div class="paket-card-wrapper">
            <!-- Paket 1 -->
            <div class="paket-card" data-aos="fade-right">
                <img src="{{ asset('image/hajiPlus.webp') }}" alt="Haji Plus">
                <div class="paket-content">
                    <h3>Haji Plus</h3>
                    <p>
                        Haji dengan izin resmi pemerintah Indonesia yang memiliki masa tunggu lebih cepat.
                    </p>
                    <div class="paket-price">
                        <span>Mulai dari</span>
                        <span>Rp 50.000.000</span>
                    </div>
                    <a href="#" class="btn-paket">Lihat Selengkapnya</a>
                </div>
            </div>

            <!-- Paket 2 -->
            <div class="paket-card" data-aos="zoom-in">
                <img src="{{ asset('image/umrohReguler.webp') }}" alt="Umroh Reguler">
                <div class="paket-content">
                    <h3>Umroh Reguler</h3>
                    <p>
                        Paket Umroh fasilitas hotel bintang 5 & harga yang lebih terjangkau.
                    </p>
                    <div class="paket-price">
                        <span>Mulai dari</span>
                        <span>Rp 29.900.000</span>
                    </div>
                    <a href="#" class="btn-paket">Lihat Selengkapnya</a>
                </div>
            </div>

            <!-- Paket 3 -->
            <div class="paket-card" data-aos="fade-left">
                <img src="{{ asset('image/tour-korea.jpg') }}" alt="Tour Korea">
                <div class="paket-content">
                    <h3>Tour Korea</h3>
                    <p>
                        Tour dengan fasilitas bintang 5 & tour guide.
                    </p>
                    <div class="paket-price">
                        <span>Mulai dari</span>
                        <span>Rp 17.400.000</span>
                    </div>
                    <a href="#" class="btn-paket">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimoni -->
<section class="testimoni" id="testimoni" data-aos="fade-up" data-aos-duration="1000">
    <div class="testimoni-container">
        <h2>Testimoni Jamaah</h2>
        <div class="testimoni-wrapper">
            <!-- Card Left -->
            <div class="testimoni-card left" data-aos="fade-right">
                <div class="image-container">
                    <img src="{{ asset('image/hajiFuroda.webp') }}" alt="Haji 2024">
                </div>
                <div class="testimoni-text">
                    <p>
                        “ Rasa syukur dan haru melebur menjadi satu menjalani ibadah Haji, Umroh. Nikmat tiada terukur Allah izinkan untuk bisa bertamu ke Tanah Suci. ”
                    </p>
                    <div class="author-section">
                        <div class="author-logo">
                            <img src="{{ asset('image/cute cat.jpg') }}" alt="Logo">
                        </div>
                        <div class="author-info">
                            <h4>NurJourney</h4>
                            <span>@nurjourney</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Right -->
            <div class="testimoni-card right" data-aos="fade-left">
                <!-- Header Profile -->
                <div class="testimoni-header">
                    <div class="profile">
                        <div class="profile-pic">
                            <img id="profileImage" src="{{ asset('image/cute cat.jpg') }}" alt="Logo">
                        </div>
                        <div class="profile-info">
                            <h4 id="profileName">NurJourney</h4>
                            <span id="profileTrip">Umroh 14 Juli 2024</span>
                        </div>
                    </div>
                </div>

                <!-- Isi Testimoni -->
                <p id="testimoniText" class="testimoni-isi active">
                    “ Sangat baik, benar-benar meninggalkan jejak iman sesuai namanya di hati jamaah. Bimbingan ibadah disampaikan dengan detail dan memudahkan jamaah yang baru pertama umrah. Kisah-kisah sirah Nabawiyah disampaikan Ustadz dengan indah dan menggugah iman. Masya Allah. Sukses terus untuk jejak imani. ”
                </p>

                <!-- Footer | Button -->
                <div class="testimoni-footer">
                    <div class="profile">
                        <div class="profile-icon">
                            <img src="{{ asset('image/Meledak kebuumaaa___.jpg') }}" alt="Profile" id="footerImage">
                        </div>
                        <div class="profile-info">
                            <h4 id="footerName">John Doe</h4>
                            <span id="footerJob">Dosen</span>
                        </div>
                    </div>

                    <div class="arrow-btn">
                        <button class="arrow" onclick="prevTestimoni()"><i class="fa fa-arrow-left"></i></button>
                        <button class="arrow" onclick="nextTestimoni()"><i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="faq-section" id="faq">
    <h2>Pertanyaan Umum (FAQ)</h2>
    <p>
        Konsultasikan rencana perjalanan ibadan umroh dan haji Anda di kantor NurJourney terdekat.
    </p>

    <div class="faq-container">
        <!-- 1 -->
        <div class="faq-item">
            <button class="faq-question">
                Apakah Rute Penerbangannya Transit atau langsung (direct)?
                <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
                <p>
                    Rute penerbangan umroh dan haji tergantung pada paket yang dipilih.Kami menyediakan penerbangan langsung (direct) maupun transit sesuai kebutuhan jamaah.
                </p>
            </div>
        </div>

        <!-- 2 -->
        <div class="faq-item">
            <button class="faq-question">
                Apa Syarat Pembuatan Passport?
                <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
                <p>
                    Syarat pembuatan passport meliputi KTP, KK, akta kelahiran, dan pas foto dengan latar belakang putih. Proses dilakukan di kantor imigrasi terdekat.
                </p>
            </div>
        </div>

        <!-- 3 -->
        <div class="faq-item">
            <button class="faq-question">
                Siapa Saja Yang Akan Membimbing Ibadah Umroh?
                <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
                <p>
                    Setiap perjalanan akan dibimbing oleh ustadz dan pembimbing profesional yang berpengalaman dalam penyelenggaraan ibadah umroh dan haji.
                </p>
            </div>
        </div>

        <!-- 4 -->
        <div class="faq-item">
            <button class="faq-question">
                Adakah Batasan Usia Untuk Umroh dan Haji Saat ini?
                <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
                <p>
                    Saat ini tidak ada batasan usia resmi, namun peserta diharapkan dalam kondisi sehat dan mampu menjalankan rangkaian ibadah dengan baik.
                </p>
            </div>
        </div>
    </div>
</section>


@include('layout.footer')