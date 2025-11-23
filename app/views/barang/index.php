<div class="container mt-4 page-barang">
    <h2>Daftar Barang</h2>

    <form action="<?= BASE_URL ?>/barang" method="GET" class="mb-3">
        <input type="hidden" name="url" value="barang">
        <div style="display:flex;gap:1rem;align-items:center;flex-wrap:wrap;">
            <!-- Tombol tambah di kiri atas sebagai ikon + -->
            <a href="<?= BASE_URL ?>/barang/create" class="btn btn-primary btn-sm" id="addBarangBtn" title="Tambah Barang"><i class="bi bi-plus-lg" aria-hidden="true"></i></a>
            <input type="text" name="search" placeholder="Cari barang" class="form-control" style="max-width: 300px;">
            <label style="white-space:nowrap;">Baris per halaman:
                <select id="rowsPerPage" class="form-control" style="width:120px;display:inline-block;margin-left:8px;">
                    <option value="5">5</option>
                    <option value="10">10</option>
                </select>
            </label>
            <div class="pagination-controls" style="margin-left:auto;">
                <button type="button" id="prevPage" class="btn btn-secondary btn-sm" disabled>Previous</button>
                <span id="pageIndicator" style="padding:0 8px;min-width:36px;text-align:center;">1</span>
                <button type="button" id="nextPage" class="btn btn-secondary btn-sm">Next</button>
            </div>
        </div>
    </form>

    <table id="barangTable" class="table table-bordered table-striped">
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
            <tr class="data-row">
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
                <td>Rp <?= number_format($b['harga'], 0, '', '.'); ?></td>

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
    <script src="<?= BASE_URL ?>/assets/barang-table-pager.js"></script>
</div>