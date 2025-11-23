<div class="container mt-4">
    <h2>Edit Barang</h2>

    <form action="<?= BASE_URL ?>/barang/update/<?= $barang['id'] ?>" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $barang['id']; ?>">

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="<?= $barang['nama_barang']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required><?= $barang['deskripsi']; ?></textarea>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <!-- Accept integer or decimal with up to 2 decimals (e.g. 3000 or 3000.00) -->
            <input type="text" name="harga" class="form-control" placeholder="Masukkan harga" pattern="[0-9]+(\.[0-9]{1,2})?" title="Hanya angka, boleh desimal dengan maksimal 2 tempat (contoh: 3000 atau 3000.00)" value="<?= $barang['harga']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="text" name="stok" class="form-control" placeholder="Masukkan stok" pattern="[0-9]+" title="Hanya boleh angka tanpa mines, koma, atau huruf" value="<?= $barang['stok']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Thumbnail Saat Ini</label> <br>
            <?php if ($barang['thumbnail']): ?>
            <img src="<?= UPLOAD_URL . $barang['thumbnail']; ?>" width="100" alt="Thumbnail saat ini">
            <div class="mt-2"><small>Nama file: <?= htmlspecialchars($barang['thumbnail']); ?></small></div>
            <?php else: ?>
            <p class="text-muted">Belum ada gambar</p>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label>Ganti Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control" accept=".jpg,.jpeg,.png" <?php if (empty($barang['thumbnail'])) echo 'required'; ?> >
            <small class="text-muted">* Format yang diterima: JPG, JPEG, PNG. Ukuran maksimal: 2 MB</small>
        </div>

    <button class="btn btn-success">Update</button>
        <a href="<?= BASE_URL ?>/barang" class="btn btn-secondary">Kembali</a>

    </form>
</div>

<script src="<?= BASE_URL ?>/assets/form-input-filter.js"></script>