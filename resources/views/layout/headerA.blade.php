<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NurJourney</title>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
</head>
<body>
    <!-- Navbar -->
    <header>
        <div class="logo">NurJourney</div>
        <nav id="navbar">
            <ul>
                <li><a href="/">Beranda</a></li>
                <li><a href="/haji">Haji</a></li>
                <li><a href="/umroh">Umroh</a></li>
                <li><a href="/wisataHalal">Wisata Halal</a></li>
                <li class="dropdown">
                    <a href="#">Info Lainnya <i class="fa-solid fa-angle-down"></i></a>
                    <div class="dropdown-content">
                        <a href="/#faq">FAQ</a>
                        <a href="/#lokasi">Lokasi</a>
                        <a href="/login">Login</a>
                    </div>
                </li>
                <!-- mobile-only -->
                <li class="mobile-only">
                    <button class="btn-konsultasi" onclick="window.location.href='/konsultasi'">Konsultasi</button>
                </li>
            </ul>
        </nav>
        <!-- desktop-only -->
        <button class="btn-konsultasi desktop-only" onclick="window.location.href='/konsultasi'">Konsultasi</button>

        <!-- Toggle Bars-->
        <div class="menu-toggle" id="menu-toggle">
            <i class="fa-solid fa-bars"></i>
        </div>
    </header>