const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", ()=> {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
})

// Menutup menu saat link di klik (opsional, baik untuk SPA-like navigation)
document.querySelectorAll(".nav-link").forEach(n => n.addEventListener("click", () => {
    if (hamburger.classList.contains("active")) { // Hanya jika menu mobile terbuka
        hamburger.classList.remove("active");
        navMenu.classList.remove("active");
    }
}));
// Animasi saat elemen di-scroll ke tampilan
document.addEventListener("DOMContentLoaded", () => {
    const animatedElements = document.querySelectorAll(".animate-on-scroll");

    if (!animatedElements.length) return;

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("is-visible");
                // Opsional: berhenti mengamati setelah animasi pertama kali
                // observer.unobserve(entry.target); 
            }
            // Opsional: hapus class jika elemen keluar viewport (untuk animasi berulang)
            // else {
            //     entry.target.classList.remove("is-visible");
            // }
        });
    }, {
        threshold: 0.1 // Persentase elemen yang harus terlihat sebelum animasi terpicu (0.1 = 10%)
        // rootMargin: "0px 0px -50px 0px" // Bisa digunakan untuk memicu animasi sedikit sebelum elemen benar-benar terlihat
    });

    animatedElements.forEach(element => {
        observer.observe(element);
    });

    // Jika Anda ingin efek animasi kartu yang muncul satu per satu (staggered)
    // dan sudah menambahkan delay di CSS (.service-card.animate-on-scroll.is-visible:nth-child(n)),
    // kode di atas sudah cukup.
    // Jika ingin kontrol delay yang lebih dinamis via JS (lebih kompleks):
    // Anda bisa loop .service-card dan set `transitionDelay` secara dinamis saat class `is-visible` ditambahkan.
    // Namun, dengan CSS `:nth-child` biasanya lebih sederhana untuk stagger yang umum.
});