<div class="container mt-4">
    <!-- Hero Section -->
    <div class="hero bw-hero">
        <h1>🛍️ Sistem Informasi Manajemen Barang</h1>
        <p>Kelola inventaris barang dengan gaya monokrom elegan</p>
        <a href="<?= BASE_URL ?>/barang" class="btn btn-primary btn-lg mt-3">
            📋 Lihat Daftar Barang
        </a>
    </div>

    <!-- Stats Section -->
    <div class="stats-container">
        <div class="stat-card">
            <i class="bi bi-box-seam stat-icon" aria-hidden="true"></i>
            <h3><?= $data['totalBarang']; ?></h3>
            <p>Total Barang</p>
        </div>
        <div class="stat-card">
            <i class="bi bi-currency-dollar stat-icon" aria-hidden="true"></i>
            <h3>Rp <?= number_format($data['totalNilai']); ?></h3>
            <p>Total Nilai Barang</p>
        </div>
        <div class="stat-card">
            <i class="bi bi-stack stat-icon" aria-hidden="true"></i>
            <h3><?= $data['totalStok']; ?></h3>
            <p>Total Stok Barang</p>
        </div>
    </div>



    <!-- Info Section -->
    <div class="alert alert-info mt-4" role="alert">
        <strong>ℹ️ Informasi:</strong> Sistem ini memudahkan Anda dalam mengelola inventaris barang. Setiap barang dapat dilengkapi dengan gambar, deskripsi, harga, dan informasi stok.
    </div>
</div>

