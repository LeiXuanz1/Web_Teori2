<div class="container mt-4">
    <h2>Hapus Barang</h2>

    <p>Yakin ingin menghapus <strong><?= $barang['nama_barang']; ?></strong>?</p>

    <a href="<?= BASE_URL ?>/barang/destroy?id=<?= $barang['id']; ?>" class="btn btn-danger">Ya, Hapus</a>
    <a href="<?= BASE_URL ?>/barang" class="btn btn-secondary">Batal</a>
</div>