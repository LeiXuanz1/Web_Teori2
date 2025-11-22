<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
            <!-- 404 Icon -->
            <div class="empty-state">
                <div class="empty-state-icon">
                    ⚠️
                </div>
                <h1 class="display-1" style="color: #dc3545; font-weight: 700;">404</h1>
                <h2 class="display-6" style="border: none; margin-bottom: 1rem;">Halaman Tidak Ditemukan</h2>
                <p class="empty-state-text">
                    Maaf, halaman yang Anda cari tidak ada atau mungkin telah dihapus.
                    Silahkan kembali ke halaman utama atau gunakan menu navigasi.
                </p>

                <!-- Error Details -->
                <div class="card mb-4" style="text-align: left;">
                    <div class="card-header">
                        📋 Detail Error
                    </div>
                    <div class="card-body">
                        <p><strong>Status Code:</strong> 404 Not Found</p>
                        <p><strong>Pesan:</strong> Sumber daya yang diminta tidak tersedia.</p>
                        <p><strong>URL yang diminta:</strong> <code><?= htmlspecialchars($_SERVER['REQUEST_URI'] ?? 'Tidak diketahui'); ?></code></p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <a href="<?= BASE_URL ?>" class="btn btn-primary btn-lg w-100">
                            🏠 Kembali ke Beranda
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="<?= BASE_URL ?>/barang" class="btn btn-success btn-lg w-100">
                            📦 Lihat Daftar Barang
                        </a>
                    </div>
                </div>

                <!-- Suggestions -->
                <div class="alert alert-warning mt-4" role="alert">
                    <strong>💡 Saran:</strong>
                    <ul style="text-align: left; margin-bottom: 0; margin-top: 0.5rem;">
                        <li>Periksa kembali URL yang Anda gunakan</li>
                        <li>Pastikan Anda memiliki akses ke halaman tersebut</li>
                        <li>Gunakan menu navigasi di atas untuk menemukan halaman yang Anda cari</li>
                        <li>Jika masalah berlanjut, hubungi administrator sistem</li>
                    </ul>
                </div>

                <!-- Additional Resources -->
                <div class="card mt-4" style="background-color: #f8f9fa;">
                    <div class="card-body">
                        <h5 class="card-title">📚 Navigasi Cepat</h5>
                        <div class="list-group">
                            <a href="<?= BASE_URL ?>" class="list-group-item list-group-item-action">Halaman Utama</a>
                            <a href="<?= BASE_URL ?>/barang" class="list-group-item list-group-item-action">Kelola Barang</a>
                            <a href="<?= BASE_URL ?>/barang/create" class="list-group-item list-group-item-action">Tambah Barang Baru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer with Time -->
    <div class="text-center mt-5 mb-3">
        <small class="text-muted">
            Error terjadi pada: <?= date('d/m/Y H:i:s', time()); ?>
        </small>
    </div>
</div>
