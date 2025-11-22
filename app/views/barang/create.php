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
<<<<<<< HEAD
            <input type="number" name="harga" class="form-control" required>
=======
            <input type="text" name="harga" class="form-control" placeholder="Masukkan harga" pattern="[0-9]+" title="Hanya boleh angka tanpa mines, koma, atau huruf" required>
>>>>>>> 994a0ee (First commit)
        </div>

        <div class="mb-3">
            <label>Stok</label>
<<<<<<< HEAD
            <input type="number" name="stok" class="form-control" required>
=======
            <input type="text" name="stok" class="form-control" placeholder="Masukkan stok" pattern="[0-9]+" title="Hanya boleh angka tanpa mines, koma, atau huruf" required>
>>>>>>> 994a0ee (First commit)
        </div>

        <div class="mb-3">
<<<<<<< HEAD
            <label>Thumbnail (opsional)</label>
<<<<<<< HEAD
            <input type="file" name="thumbnail" class="form-control">
=======
            <input type="file" name="thumbnail" class="form-control" accept=".jpg,.jpeg,.png">
=======
            <label>Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control" accept=".jpg,.jpeg,.png" required>
>>>>>>> 4ed81b4 (update: perbaikan upload, validasi stok & harga, UI home)
            <small class="text-muted">* Format yang diterima: JPG, JPEG, PNG. Ukuran maksimal: 2 MB</small>
>>>>>>> 994a0ee (First commit)
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="<?= BASE_URL ?>/barang" class="btn btn-secondary">Kembali</a>

    </form>
<<<<<<< HEAD
</div>
=======
</div>

<script src="<?= BASE_URL ?>/assets/form-input-filter.js"></script>
>>>>>>> 994a0ee (First commit)
