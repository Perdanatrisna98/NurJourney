const menuToggle = document.getElementById("menu-toggle");
const navUl = document.querySelector("nav ul");

// Toggle
menuToggle.addEventListener("click", () => {
    navUl.classList.toggle("active");
    menuToggle.innerHTML = navUl.classList.contains("active") ? '<i class="fa-solid fa-xmark"></i>' : '<i class="fa-solid fa-bars"></i>';
});

dropdown.addEventListener("click", (e) => {
    e.stopPropagation();
    dropdown.classList.toggle("active");
});

document.addEventListener("click", (e) => {
    if (!e.target.closest("nav") && !e.target.closest("#menu-toggle")) {
        navUl.classList.remove("active");
        dropdown.classList.remove("active");
        menuToggle.innerHTML = '<i class="fa-solid fa-bars"></i>';
    }
});
