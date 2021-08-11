        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>dashboard">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">
                    <i class="fas fa-book-reader"></i>
                    AFK LIBRARY
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Daftar Anggota -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url() ?>anggota">
                    <i class="fas fa-users"></i>
                    <span>Data Anggota</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url() ?>buku">
                    <i class="fas fa-book"></i>
                    <span>Data Buku</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url() ?>kelas">
                    <i class="fas fa-school"></i>
                    <span>Data Kelas</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Transaksi
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>peminjaman">
                    <i class="fas fa-book-open"></i>
                    <span>Peminjaman Buku</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Admin
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url() ?>petugas">
                    <i class="fas fa-user"></i>
                    <span>Manajemen User</span>
                </a>
            </li>

        </ul>
        <!-- End of Sidebar -->