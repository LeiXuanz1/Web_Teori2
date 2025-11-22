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
            <input type="number" name="harga" class="form-control" value="<?= $barang['harga']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" value="<?= $barang['stok']; ?>" required>
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
            <input type="file" name="thumbnail" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="<?= BASE_URL ?>/barang" class="btn btn-secondary">Kembali</a>

    </form>
</div>