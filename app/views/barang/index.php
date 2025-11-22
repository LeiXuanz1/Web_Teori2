<div class="container mt-4">
    <h2>Daftar Barang</h2>

    <a href="<?= BASE_URL ?>/barang/create" class="btn btn-primary mb-3">Tambah Barang</a>

    <form action="" method="GET" class="mb-3">
        <input type="hidden" name="url" value="barang">
        <input type="text" name="search" placeholder="Cari barang" class="form-control" style="max-width: 300px;">
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Thumbnail</th>
                <th>Nama Barang</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barang as $b): ?>
            <tr>
                <td>
                    <?php if (!empty($b['thumbnail'])): ?>
                    <img src="<?= UPLOAD_URL . $b['thumbnail']; ?>" width="70">
                    <?php else: ?>
                    <span class="text-muted">Tidak ada</span>
                    <?php endif; ?>
                </td>

                <td><?= htmlspecialchars($b['nama_barang']); ?></td>

                <!-- DESKRIPSI -->
                <td><?= htmlspecialchars($b['deskripsi']); ?></td>

                <!-- HARGA -->
                <td>Rp <?= number_format($b['harga']); ?></td>

                <!-- STOK -->
                <td><?= $b['stok']; ?></td>

                <td>
                    <a href="<?= BASE_URL ?>/barang/edit/<?= $b['id']; ?>" class="btn btn-warning btn-sm">Edit</a>

                    <a href="<?= BASE_URL ?>/barang/delete/<?= $b['id']; ?>"
                        onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>