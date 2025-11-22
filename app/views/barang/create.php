<div class="container mt-4">
    <h2>Tambah Barang</h2>

    <form action="<?= BASE_URL ?>/barang/store" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Thumbnail (opsional)</label>
            <input type="file" name="thumbnail" class="form-control">
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="<?= BASE_URL ?>/barang" class="btn btn-secondary">Kembali</a>

    </form>
</div>