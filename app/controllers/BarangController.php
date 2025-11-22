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
<<<<<<< HEAD
        $data = [
            'nama_barang'     => $_POST['nama_barang'],
            'deskripsi' => $_POST['deskripsi'],
            'harga'    => $_POST['harga'],
            'stok'     => $_POST['stok']
=======
        // Validasi harga
        $harga = $_POST['harga'];
        if (!is_numeric($harga) || $harga < 0) {
            die("Error: Harga harus berupa angka positif.");
        }

        // Validasi stok
        $stok = $_POST['stok'];
        if (!is_numeric($stok) || $stok < 0) {
            die("Error: Stok harus berupa angka positif.");
        }

        $data = [
            'nama_barang'     => $_POST['nama_barang'],
            'deskripsi' => $_POST['deskripsi'],
            'harga'    => (int)$harga,
            'stok'     => (int)$stok
>>>>>>> 994a0ee (First commit)
        ];

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
<<<<<<< HEAD
        $data = [
            'nama_barang'     => $_POST['nama_barang'],
            'deskripsi' => $_POST['deskripsi'],
            'harga'    => $_POST['harga'],
            'stok'     => $_POST['stok']
=======
        // Validasi harga
        $harga = $_POST['harga'];
        if (!is_numeric($harga) || $harga < 0) {
            die("Error: Harga harus berupa angka positif.");
        }

        // Validasi stok
        $stok = $_POST['stok'];
        if (!is_numeric($stok) || $stok < 0) {
            die("Error: Stok harus berupa angka positif.");
        }

        $data = [
            'nama_barang'     => $_POST['nama_barang'],
            'deskripsi' => $_POST['deskripsi'],
            'harga'    => (int)$harga,
            'stok'     => (int)$stok
>>>>>>> 994a0ee (First commit)
        ];

        $file = $_FILES['thumbnail'];

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