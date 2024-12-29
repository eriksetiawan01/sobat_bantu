const hamburgerButton = document.getElementById('hamburger-button');
const mobileMenu = document.getElementById('mobile-menu');

// Tambahkan event listener untuk toggle menu
hamburgerButton.addEventListener('click', () => {
    // Toggle kelas 'open' untuk mengubah tombol hamburger menjadi X
    hamburgerButton.classList.toggle('open');
    
    // Toggle visibilitas dari menu mobile
    mobileMenu.classList.toggle('hidden');
    
    // Tambahkan efek transisi untuk smooth appearance dan disappearance
    if (mobileMenu.classList.contains('hidden')) {
        mobileMenu.style.opacity = '0';
        mobileMenu.style.transform = 'translateY(-20px)';
    } else {
        mobileMenu.style.opacity = '1';
        mobileMenu.style.transform = 'translateY(0)';
    }
});
