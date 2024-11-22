// Mobile Menu Toggle
const menuBtn = document.getElementById('menu-btn');
const mobileMenu = document.getElementById('mobile-menu');

if (menuBtn && mobileMenu) {
  menuBtn.addEventListener('click', () => {
    if (mobileMenu.classList.contains('hidden')) {
      mobileMenu.classList.remove('hidden');
      mobileMenu.style.maxHeight = mobileMenu.scrollHeight + "px"; // Smooth opening
    } else {
      mobileMenu.style.maxHeight = null;
      setTimeout(() => mobileMenu.classList.add('hidden'), 300); // Smooth closing
    }
  });
}

// Back to Top Button
const backToTopButton = document.getElementById('back-to-top');

if (backToTopButton) {
  window.addEventListener('scroll', () => {
    if (window.scrollY > 200) {
      backToTopButton.classList.remove('hidden');
    } else {
      backToTopButton.classList.add('hidden');
    }
  });

  backToTopButton.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}

document.addEventListener('DOMContentLoaded', () => {
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');

    dropdownButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
        // Pastikan dropdown memiliki ukuran tinggi yang sesuai di mobile
        if (!dropdownMenu.classList.contains('hidden')) {
            dropdownMenu.style.maxHeight = dropdownMenu.scrollHeight + 'px'; // Membuka dengan tinggi yang sesuai
            dropdownMenu.classList.remove('scale-95'); // Menambahkan animasi buka
        } else {
            dropdownMenu.style.maxHeight = null;
            dropdownMenu.classList.add('scale-95'); // Menambahkan animasi tutup
        }
    });

    // Menutup dropdown jika klik di luar
    document.addEventListener('click', (event) => {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
            dropdownMenu.style.maxHeight = null; // Reset tinggi dropdown
            dropdownMenu.classList.add('scale-95'); // Reset animasi
        }
    });
});
