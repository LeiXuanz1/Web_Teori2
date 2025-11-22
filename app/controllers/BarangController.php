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
        $data = [
            'nama_barang'     => $_POST['nama_barang'],
            'deskripsi' => $_POST['deskripsi'] ?? null,
            'harga'    => $_POST['harga'],
            'stok'     => $_POST['stok']
        ];

        $file = $_FILES['thumbnail'] ?? null;

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
        $data = [
            'nama_barang'     => $_POST['nama_barang'],
            'deskripsi' => $_POST['deskripsi'] ?? null,
            'harga'    => $_POST['harga'],
            'stok'     => $_POST['stok']
        ];

        $file = $_FILES['thumbnail'] ?? null;

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