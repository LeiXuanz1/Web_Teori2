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
            <textarea name="deskripsi" class="form-control"><?= $barang['deskripsi']; ?></textarea>
        </div>

        <div class="mb-3">
            <label>Harga</label>
<<<<<<< HEAD
            <input type="number" name="harga" class="form-control" value="<?= $barang['harga']; ?>" required>
=======
            <input type="text" name="harga" class="form-control" placeholder="Masukkan harga" pattern="[0-9]+" title="Hanya boleh angka tanpa mines, koma, atau huruf" value="<?= $barang['harga']; ?>" required>
>>>>>>> 994a0ee (First commit)
        </div>

        <div class="mb-3">
            <label>Stok</label>
<<<<<<< HEAD
            <input type="number" name="stok" class="form-control" value="<?= $barang['stok']; ?>" required>
=======
            <input type="text" name="stok" class="form-control" placeholder="Masukkan stok" pattern="[0-9]+" title="Hanya boleh angka tanpa mines, koma, atau huruf" value="<?= $barang['stok']; ?>" required>
>>>>>>> 994a0ee (First commit)
        </div>

        <div class="mb-3">
            <label>Thumbnail Saat Ini</label> <br>
            <?php if ($barang['thumbnail']): ?>
            <img src="/uploads/<?= $barang['thumbnail']; ?>" width="100">
            <?php else: ?>
            <p class="text-muted">Belum ada gambar</p>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label>Ganti Thumbnail (opsional)</label>
<<<<<<< HEAD
            <input type="file" name="thumbnail" class="form-control">
=======
            <input type="file" name="thumbnail" class="form-control" accept=".jpg,.jpeg,.png">
            <small class="text-muted">* Format yang diterima: JPG, JPEG, PNG. Ukuran maksimal: 2 MB</small>
>>>>>>> 994a0ee (First commit)
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="<?= BASE_URL ?>/barang" class="btn btn-secondary">Kembali</a>

    </form>
<<<<<<< HEAD
</div>
=======
</div>

<script src="<?= BASE_URL ?>/assets/form-input-filter.js"></script>
>>>>>>> 994a0ee (First commit)
