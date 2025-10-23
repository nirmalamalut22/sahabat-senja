<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengeluaran - Sahabat Senja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    /* ========== Warna Coklat dan Krem ========== */
    :root {
        --primary-color: #8B4513;      /* Coklat tua */
        --secondary-color: #A0522D;    /* Coklat sedang */
        --accent-color: #D2691E;       /* Coklat muda */
        --dark-bg: #654321;            /* Coklat tua gelap */
        --light-bg: #fdf6e3;           /* Krem sangat muda */
        --text-dark: #3E2723;          /* Coklat tua untuk teks */
        --text-light: #5D4037;         /* Coklat sedang untuk teks */
        --card-bg: #ffffff;
        --hover-color: #CD853F;        /* Coklat pale untuk hover */
        --card-shadow: 0 4px 6px rgba(139, 69, 19, 0.1);
        --success-color: #8FBC8F;      /* Hijau earth tone */
        --warning-color: #D2B48C;      /* Tan untuk warning */
        --border-color: #E8DCC6;       /* Krem medium untuk border */
        --cream-light: #FFF8DC;        /* Krem terang */
        --cream-medium: #F5F0E6;       /* Krem medium */
    }

    body {
        background: linear-gradient(135deg, var(--light-bg) 0%, var(--cream-light) 100%);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: var(--text-dark);
        min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
        background: linear-gradient(180deg, var(--primary-color) 0%, var(--dark-bg) 100%);
        color: white;
        width: 280px;
        min-height: 100vh;
        position: fixed;
        box-shadow: 2px 0 10px rgba(139, 69, 19, 0.3);
        z-index: 1000;
        transition: all 0.3s;
        left: 0;
    }
    
    .sidebar.collapsed {
        width: 80px;
    }
    
    .sidebar.collapsed .sidebar-brand h1 span,
    .sidebar.collapsed .nav-link span {
        display: none;
    }
    
    .sidebar.collapsed .sidebar-brand i,
    .sidebar.collapsed .nav-link i {
        margin-right: 0;
    }
    
    .sidebar-brand {
        padding: 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        text-align: center;
        position: relative;
        background: var(--dark-bg);
    }
    
    .sidebar-brand h1 {
        font-weight: 700;
        font-size: 1.5rem;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
    }
    
    .sidebar-brand i {
        margin-right: 10px;
        font-size: 1.8rem;
        transition: all 0.3s;
        color: var(--cream-light);
    }
    
    .toggle-btn {
        position: absolute;
        right: -12px;
        top: 50%;
        transform: translateY(-50%);
        background: var(--accent-color);
        border: 2px solid white;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: white;
        font-size: 0.8rem;
        transition: all 0.3s;
    }
    
    .toggle-btn:hover {
        background: var(--secondary-color);
    }
    
    .sidebar.collapsed .toggle-btn {
        transform: translateY(-50%) rotate(180deg);
    }
    
    .sidebar-nav {
        padding: 1rem 0;
    }
    
    .nav-item {
        margin-bottom: 0.5rem;
        position: relative;
    }
    
    .nav-link {
        color: rgba(255, 255, 255, 0.85);
        padding: 0.8rem 1.5rem;
        display: flex;
        align-items: center;
        transition: all 0.3s;
        border-left: 4px solid transparent;
        white-space: nowrap;
        overflow: hidden;
    }
    
    .nav-link:hover, .nav-link.active {
        background-color: rgba(160, 82, 45, 0.3);
        color: white;
        border-left-color: var(--accent-color);
    }
    
    .nav-link i {
        width: 24px;
        margin-right: 12px;
        font-size: 1.1rem;
        transition: all 0.3s;
        flex-shrink: 0;
    }

    /* Main Content */
    .main-content {
        margin-left: 280px;
        padding: 0;
        min-height: 100vh;
        transition: all 0.3s;
    }
    
    .main-content.expanded {
        margin-left: 80px;
    }

    /* Header */
    .top-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 1rem 2rem;
        position: sticky;
        top: 0;
        z-index: 100;
        box-shadow: 0 2px 10px rgba(139, 69, 19, 0.2);
        border-bottom: 1px solid var(--accent-color);
    }
    
    .header-title {
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        font-size: 1.4rem;
    }
    
    .header-title i {
        margin-right: 10px;
        color: white;
    }
    
    .user-info {
        display: flex;
        align-items: center;
        margin-right: 1.5rem;
    }
    
    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--accent-color), var(--secondary-color));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        margin-right: 10px;
    }
    
    .logout-btn {
        background-color: var(--accent-color);
        border: none;
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.3s;
    }
    
    .logout-btn:hover {
        background-color: var(--secondary-color);
        transform: translateY(-2px);
    }

    /* Container */
    .container {
        max-width: 1200px;
        margin-top: 2rem;
        padding: 0 2rem;
    }

    /* Tombol tambah */
    .btn-add {
        background: linear-gradient(135deg, var(--accent-color), var(--secondary-color));
        border: none;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        transition: 0.3s;
        font-weight: 500;
        font-size: 1rem;
        box-shadow: 0 4px 6px rgba(139, 69, 19, 0.3);
    }

    .btn-add:hover {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
        transform: translateY(-2px);
        box-shadow: 0 6px 8px rgba(160, 82, 45, 0.4);
    }

    /* Laporan Section */
    .laporan-section {
        background: var(--card-bg);
        border-radius: 12px;
        padding: 0;
        margin-bottom: 25px;
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
        border: 1px solid var(--border-color);
        overflow: hidden;
        border-left: 4px solid var(--accent-color);
    }

    .laporan-section:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 15px rgba(139, 69, 19, 0.15);
    }

    .laporan-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0;
    }

    .laporan-header h4 {
        margin: 0;
        font-weight: 600;
        font-size: 1.3rem;
    }

    .laporan-header h4 i {
        margin-right: 10px;
        color: white;
    }

    .btn-edit {
        background: linear-gradient(135deg, var(--warning-color), #B8860B);
        border: none;
        color: white;
        padding: 8px 16px;
        border-radius: 6px;
        transition: 0.3s;
        font-weight: 500;
    }

    .btn-edit:hover {
        background: linear-gradient(135deg, #B8860B, var(--warning-color));
        transform: translateY(-2px);
    }

    /* Tabel */
    .table-container {
        padding: 20px;
    }

    .table {
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid var(--border-color);
        margin: 0;
    }

    thead {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
        color: white;
    }

    th {
        font-weight: 600;
        padding: 15px 12px;
        border: none;
        font-size: 0.9rem;
    }

    td {
        padding: 12px;
        vertical-align: middle;
        border-color: var(--border-color);
        font-size: 0.9rem;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(139, 69, 19, 0.05);
        transition: 0.2s;
    }

    /* Status badges */
    .badge-success {
        background: linear-gradient(135deg, var(--success-color), #6B8E23);
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .badge-warning {
        background: linear-gradient(135deg, var(--warning-color), #CD853F);
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    /* Angka dengan warna tema */
    .amount-positive {
        color: var(--success-color);
        font-weight: 600;
    }

    .amount-negative {
        color: #8B0000;
        font-weight: 600;
    }

    /* Footer */
    .footer {
        background: linear-gradient(135deg, var(--dark-bg), var(--primary-color));
        color: white;
        padding: 1.5rem 0;
        margin-top: 3rem;
        text-align: center;
        border-top: 1px solid var(--accent-color);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .sidebar {
            width: 80px;
        }
        
        .sidebar .sidebar-brand h1 span,
        .sidebar .nav-link span {
            display: none;
        }
        
        .sidebar .sidebar-brand i,
        .sidebar .nav-link i {
            margin-right: 0;
        }
        
        .main-content {
            margin-left: 80px;
        }
        
        .toggle-btn {
            display: none;
        }
    }
    
    @media (max-width: 768px) {
        .sidebar {
            width: 0;
            transform: translateX(-100%);
        }
        
        .sidebar.show {
            width: 280px;
            transform: translateX(0);
        }
        
        .main-content {
            margin-left: 0;
        }
        
        .mobile-menu-btn {
            display: block !important;
        }
        
        .user-info {
            display: none;
        }

        .laporan-header {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }

        .container {
            padding: 0 1rem;
        }
    }
    
    .mobile-menu-btn {
        display: none;
        background: none;
        border: none;
        font-size: 1.5rem;
        color: white;
        margin-right: 1rem;
    }
</style>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <h1>
                <i class="fas fa-heartbeat"></i>
                <span>Sahabat Senja</span>
            </h1>
            <div class="toggle-btn" id="toggleSidebar">
                <i class="fas fa-chevron-left"></i>
            </div>
        </div>
        
        <div class="sidebar-nav">
            <div class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.datalansia.index') }}" class="nav-link">
                    <i class="fas fa-user-friends"></i>
                    <span>Data Lansia</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.dataperawat.index') }}" class="nav-link">
                    <i class="fas fa-user-md"></i>
                    <span>Data Perawat</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('laporan.pemasukan') }}" class="nav-link">
                    <i class="fas fa-chart-line"></i>
                    <span>Laporan Pemasukan</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('laporan.pengeluaran') }}" class="nav-link active">
                    <i class="fas fa-chart-bar"></i>
                    <span>Laporan Pengeluaran</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-chart-pie"></i>
                    <span>Grafik Keseluruhan</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Header -->
        <div class="top-header d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="header-title">
                    <i class="fas fa-chart-bar"></i>Laporan Pengeluaran
                </h1>
            </div>
            
            <div class="d-flex align-items-center">
                <div class="user-info">
                    <div class="user-avatar">A</div>
                    <div>
                        <div class="fw-bold">Admin</div>
                        <small>Pengelola</small>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </button>
                </form>
            </div>
        </div>

        <div class="container">
            <!-- Tombol tambah laporan -->
            <div class="d-flex justify-content-end mb-4">
                <button class="btn btn-add"><i class="fas fa-plus me-2"></i>Buat Laporan Pengeluaran</button>
            </div>

            <!-- Contoh laporan bulanan -->
            @foreach (['Juni', 'Juli', 'Agustus'] as $bulan)
            <div class="laporan-section">
                <div class="laporan-header">
                    <h4><i class="fas fa-money-bill-wave me-2"></i>Laporan Pengeluaran {{ $bulan }} 2025</h4>
                    <button class="btn btn-edit"><i class="fas fa-pen me-1"></i>Edit Laporan</button>
                </div>

                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Keterangan</th>
                                    <th>Jenis Pengeluaran</th>
                                    <th>Nominal (Rp)</th>
                                    <th>Tanggal</th>
                                    <th>Total Sisa (Rp)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pembelian obat dan vitamin</td>
                                    <td>Kesehatan</td>
                                    <td class="amount-negative">1.200.000</td>
                                    <td>03/{{ $bulan }}/2025</td>
                                    <td class="amount-positive">5.500.000</td>
                                </tr>
                                <tr>
                                    <td>Perbaikan fasilitas panti</td>
                                    <td>Pemeliharaan</td>
                                    <td class="amount-negative">2.000.000</td>
                                    <td>12/{{ $bulan }}/2025</td>
                                    <td class="amount-positive">3.500.000</td>
                                </tr>
                                <tr>
                                    <td>Konsumsi harian lansia</td>
                                    <td>Kebutuhan Pokok</td>
                                    <td class="amount-negative">1.500.000</td>
                                    <td>25/{{ $bulan }}/2025</td>
                                    <td class="amount-positive">2.000.000</td>
                                </tr>
                                <tr>
                                    <td>Gaji perawat</td>
                                    <td>Operasional</td>
                                    <td class="amount-negative">3.000.000</td>
                                    <td>28/{{ $bulan }}/2025</td>
                                    <td class="amount-negative">-1.000.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <footer class="footer">
            <p class="mb-0">&copy; 2025 Sahabat Senja — Sistem Informasi Panti Jompo Berbasis Website & Mobile.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Sidebar
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });

        // Mobile Menu Toggle
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !mobileMenuBtn.contains(event.target) &&
                sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            }
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('sidebar');
            if (window.innerWidth > 768) {
                sidebar.classList.remove('show');
            }
        });
    </script>
</body>
</html>