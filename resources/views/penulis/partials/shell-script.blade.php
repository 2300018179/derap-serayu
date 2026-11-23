<script>
    // Sidebar untuk tampilan mobile
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay')
            || document.getElementById('mobileOverlay');

        if (!sidebar || !overlay) {
            return;
        }

        sidebar.classList.toggle(overlay.id === 'sidebarOverlay' ? 'show' : 'open');
        overlay.classList.toggle('show');
    }

    // Membuka atau menutup dropdown akun dan notifikasi.
    function toggleTopDropdown(dropdownId, trigger) {
        const dropdown = document.getElementById(dropdownId);
        const isAlreadyOpen = dropdown.classList.contains('show');

        // Tutup dropdown lain yang sedang terbuka.
        document.querySelectorAll('.top-dropdown-menu.show').forEach(menu => {
            menu.classList.remove('show');
        });

        document.querySelectorAll('.dropdown-trigger').forEach(button => {
            button.setAttribute('aria-expanded', 'false');
        });

        // Buka dropdown yang dipilih.
        if (!isAlreadyOpen) {
            dropdown.classList.add('show');
            trigger.setAttribute('aria-expanded', 'true');
        }
    }

    // Tutup dropdown saat klik di luar menu.
    document.addEventListener('click', function (event) {
        if (!event.target.closest('.top-dropdown')) {
            document.querySelectorAll('.top-dropdown-menu.show').forEach(menu => {
                menu.classList.remove('show');
            });

            document.querySelectorAll('.dropdown-trigger').forEach(button => {
                button.setAttribute('aria-expanded', 'false');
            });
        }
    });

    // Tutup dropdown saat tombol Escape ditekan.
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            document.querySelectorAll('.top-dropdown-menu.show').forEach(menu => {
                menu.classList.remove('show');
            });

            document.querySelectorAll('.dropdown-trigger').forEach(button => {
                button.setAttribute('aria-expanded', 'false');
            });
        }
    });
</script>
