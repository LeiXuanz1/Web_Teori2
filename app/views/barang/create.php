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
            <input type="text" name="harga" class="form-control" placeholder="Masukkan harga" pattern="[0-9]+" title="Hanya boleh angka tanpa mines, koma, atau huruf" required>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="text" name="stok" class="form-control" placeholder="Masukkan stok" pattern="[0-9]+" title="Hanya boleh angka tanpa mines, koma, atau huruf" required>
        </div>

        <div class="mb-3">
            <label>Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control" accept=".jpg,.jpeg,.png" required>
            <small class="text-muted">* Format yang diterima: JPG, JPEG, PNG. Ukuran maksimal: 2 MB</small>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="<?= BASE_URL ?>/barang" class="btn btn-secondary">Kembali</a>

    </form>
</div>

<script src="<?= BASE_URL ?>/assets/form-input-filter.js"></script>