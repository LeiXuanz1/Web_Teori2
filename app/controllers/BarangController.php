<?php

class BarangController extends Controller
{
    private $barangModel;

    public function __construct()
    {
        $this->barangModel = $this->model("Barang");
    }

    // HALAMAN LIST DATA
    public function index()
    {
        // fitur pencarian
        if (isset($_GET['search']) && $_GET['search'] !== "") {
            $keyword = $_GET['search'];
            $barang = $this->barangModel->search($keyword);
        } else {
            $barang = $this->barangModel->getAll();
        }

        $this->view('barang/index', ['barang' => $barang]);
    }

    // FORM TAMBAH
    public function create()
    {
        $this->view('barang/create');
    }

    // INPUT DATA
    public function store()
    {
        // Sanitasi & validasi harga
        $rawHarga = isset($_POST['harga']) ? $_POST['harga'] : '';
        // keep only digits and dot, collapse extra dots and limit decimals to 2
        $hargaClean = preg_replace('/[^0-9.]/', '', $rawHarga);
        $parts = explode('.', $hargaClean);
        if (count($parts) > 1) {
            $intPart = array_shift($parts);
            $decPart = substr(implode('', $parts), 0, 2);
            $hargaClean = $intPart . (strlen($decPart) ? '.' . $decPart : '');
        }
        if ($hargaClean === '') $hargaClean = '0';

        if (!is_numeric($hargaClean) || $hargaClean < 0) {
            die("Error: Harga harus berupa angka positif.");
        }

        // Sanitasi & validasi stok
        $rawStok = isset($_POST['stok']) ? $_POST['stok'] : '';
        $stokClean = preg_replace('/[^0-9]/', '', $rawStok);
        if ($stokClean === '') $stokClean = '0';
        if (!is_numeric($stokClean) || $stokClean < 0) {
            die("Error: Stok harus berupa angka positif.");
        }

        // Validasi deskripsi (wajib)
        $deskripsi = isset($_POST['deskripsi']) ? trim($_POST['deskripsi']) : '';
        if ($deskripsi === '') {
            die("Error: Deskripsi wajib diisi.");
        }

        $data = [
            'nama_barang'     => $_POST['nama_barang'],
            'deskripsi' => $deskripsi,
            // pass sanitized harga as numeric string (DB DECIMAL will store correctly)
            'harga'    => $hargaClean,
            'stok'     => (int)$stokClean
        ];

        // Periksa apakah thumbnail diupload (wajib)
        if (!isset($_FILES['thumbnail']) || empty($_FILES['thumbnail']['name']) || $_FILES['thumbnail']['error'] !== 0) {
            die("Error: Thumbnail wajib diupload.");
        }

        $file = $_FILES['thumbnail'];

        $this->barangModel->insert($data, $file);

        header("Location: " . BASE_URL . "/barang");
        exit;
    }

    // FORM EDIT
    public function edit($id)
    {
        $barang = $this->barangModel->find($id);

        if (!$barang) {
            die("Data barang tidak ditemukan.");
        }

        $this->view('barang/edit', ['barang' => $barang]);
    }

    // UPDATE DATA
    public function update($id)
    {
        // Sanitasi & validasi harga
        $rawHarga = isset($_POST['harga']) ? $_POST['harga'] : '';
        $hargaClean = preg_replace('/[^0-9.]/', '', $rawHarga);
        $parts = explode('.', $hargaClean);
        if (count($parts) > 1) {
            $intPart = array_shift($parts);
            $decPart = substr(implode('', $parts), 0, 2);
            $hargaClean = $intPart . (strlen($decPart) ? '.' . $decPart : '');
        }
        if ($hargaClean === '') $hargaClean = '0';
        if (!is_numeric($hargaClean) || $hargaClean < 0) {
            die("Error: Harga harus berupa angka positif.");
        }

        // Sanitasi & validasi stok
        $rawStok = isset($_POST['stok']) ? $_POST['stok'] : '';
        $stokClean = preg_replace('/[^0-9]/', '', $rawStok);
        if ($stokClean === '') $stokClean = '0';
        if (!is_numeric($stokClean) || $stokClean < 0) {
            die("Error: Stok harus berupa angka positif.");
        }

        // Validasi deskripsi (wajib)
        $deskripsi = isset($_POST['deskripsi']) ? trim($_POST['deskripsi']) : '';
        if ($deskripsi === '') {
            die("Error: Deskripsi wajib diisi.");
        }

        $data = [
            'nama_barang'     => $_POST['nama_barang'],
            'deskripsi' => $deskripsi,
            'harga'    => $hargaClean,
            'stok'     => (int)$stokClean
        ];

        $file = $_FILES['thumbnail'];

        // Jika tidak mengupload file baru, pastikan barang sudah punya thumbnail sebelumnya
        if (empty($file['name']) || $file['error'] !== 0) {
            $existing = $this->barangModel->find($id);
            if (!$existing) {
                die("Data barang tidak ditemukan.");
            }
            if (empty($existing['thumbnail'])) {
                die("Error: Thumbnail wajib diupload.");
            }
        }

        $this->barangModel->update($id, $data, $file);

        header("Location: " . BASE_URL . "/barang");
        exit;
    }

    // HAPUS DATA
    public function delete($id)
    {
        $this->barangModel->delete($id);

        header("Location: " . BASE_URL . "/barang");
        exit;
    }
}

?>