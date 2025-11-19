AOS.init({
    once: false,
    duration: 800,
    easing: "ease-in-out"
});

const dropdown = document.querySelector('.dropdown');
const dropdownContent = document.querySelector('.dropdown-content');

// Dropdown
dropdown.querySelector('a').addEventListener('click', (e) => {
    e.preventDefault();
    e.stopPropagation();
    dropdownContent.style.display = dropdownContent.style.display === 'flex' ? 'none' : 'flex';
});

document.addEventListener('click', (e) => {
    if (!dropdown.contains(e.target)) {
        dropdownContent.style.display = 'none';
    }
});

dropdownContent.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', (e) => {
        dropdownContent.style.display = 'none';
    });
});

// Modal
document.addEventListener("DOMContentLoaded", () => {
    const hero = document.querySelector(".hero");
    hero.style.opacity = "0";
    hero.style.transition = "opacity 1.5s ease";
    setTimeout(() => (hero.style.opacity = "1"), 200);

    const modal = document.getElementById("promoModal");
    setTimeout(() => {
        modal.style.display = "flex";
    }, 3000);

    document.getElementById("closeModal").addEventListener("click", () => {
        modal.style.display = "none";
    });
});

// Header Scroll
window.addEventListener('scroll', function () {
    const header = document.querySelector('header');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

// Testimoni
let current = 0;

const testimonis = [
    {
        name: "NurJourney",
        trip: "Umroh 14 Juli 2024",
        image: "../image/cute cat.jpg",
        footerImage: "../image/Meledak kebuumaaa___.jpg",
        footerName: "Zho Koh wi",
        footerJob: "Dosen",
        text: "“ Sangat baik, benar-benar meninggalkan jejak iman sesuai namanya di hati jamaah. Bimbingan ibadah disampaikan dengan detail dan memudahkan jamaah yang baru pertama umrah. Kisah-kisah sirah Nabawiyah disampaikan Ustadz dengan indah dan menggugah iman. Masya Allah. Sukses terus untuk jejak imani. ”"
    },
    {
        name: "NurJourney",
        trip: "Haji 20 Desember 2024",
        image: "../image/cute cat.jpg",
        footerImage: "../image/Chuột xinhh iuu.jpg",
        footerName: "Asep",
        footerJob: "Pengusaha Crypto",
        text: "“ Pengalaman luar biasa! Semua fasilitas dan bimbingannya sangat profesional, membuat perjalanan ibadah menjadi khusyuk dan nyaman. ”"
    },
    {
        name: "NurJourney",
        trip: "Tour Korea 1 Januari 2025",
        image: "../image/cute cat.jpg",
        footerImage: "../image/download (7).jpg",
        footerName: "Ilham",
        footerJob: "Affiliator",
        text: "“ Layanan ramah, itinerary menarik, dan semua berjalan lancar. Terima kasih atas pengalaman spiritual dan wisata yang berkesan! ”"
    },
];

function showTestimoni(index) {
    const t = testimonis[index];
    const textEl = document.getElementById("testimoniText");
    textEl.classList.remove("active");

    setTimeout(() => {
        document.getElementById("profileName").textContent = t.name;
        document.getElementById("profileTrip").innerHTML = `<span>${t.trip}</span>`;
        document.getElementById("profileImage").src = t.image;
        document.getElementById("footerImage").src = t.footerImage;
        document.getElementById("footerName").textContent = t.footerName;
        document.getElementById("footerJob").textContent = t.footerJob;
        textEl.textContent = t.text;
        textEl.classList.add("active");
    }, 300);
}

function nextTestimoni() {
    current = (current + 1) % testimonis.length;
    showTestimoni(current);
}

function prevTestimoni() {
    current = (current - 1 + testimonis.length) % testimonis.length;
    showTestimoni(current);
}

// FAQ
const faqs = document.querySelectorAll(".faq-item");

faqs.forEach((item) => {
    const button = item.querySelector(".faq-question");

    button.addEventListener("click", () => {
        item.classList.toggle("active");
        faqs.forEach((other) => {
            if (other !== item) other.classList.remove("active");
        });
    });
});