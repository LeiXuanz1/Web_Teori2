<?php

require_once "../app/config/Database.php";

class Barang
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    // GET ALL DATA
    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM barang ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // SEARCH DATA
    public function search($keyword)
    {
        $keyword = "%$keyword%";
        $stmt = $this->db->prepare("
            SELECT * FROM barang 
            WHERE nama_barang LIKE ?
            ORDER BY id DESC
        ");
        $stmt->execute([$keyword, $keyword]);
        return $stmt->fetchAll();
    }

    // FIND BY ID
    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM barang WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // INSERT DATA
    public function insert($data, $file)
    {
        // Upload file
        $thumbnail = $this->uploadImage($file);

        $stmt = $this->db->prepare("
            INSERT INTO barang (nama_barang, deskripsi, harga, stok, thumbnail)
            VALUES (?, ?, ?, ?, ?)
        ");

        return $stmt->execute([
            $data['nama_barang'],
            $data['deskripsi'],
            $data['harga'],
            $data['stok'],
            $thumbnail
        ]);
    }

    // UPDATE DATA
    public function update($id, $data, $file)
    {
        // Jika user upload file baru
        if (!empty($file['name'])) {
            $thumbnail = $this->uploadImage($file);
        } else {
            $barang = $this->find($id);
            $thumbnail = $barang['thumbnail'];
        }

        $stmt = $this->db->prepare("
            UPDATE barang
            SET nama_barang = ?, deskripsi = ?, harga = ?, stok = ?, thumbnail = ?
            WHERE id = ?
        ");

        return $stmt->execute([
            $data['nama_barang'],
            $data['deskripsi'],
            $data['harga'],
            $data['stok'],
            $thumbnail,
            $id
        ]);
    }

    // DELETE DATA
    public function delete($id)
    {
        // Hapus file thumbnail
        $barang = $this->find($id);
        if (!empty($barang['thumbnail'])) {
            $filePath = UPLOAD_DIR . $barang['thumbnail'];
            if (file_exists($filePath)) unlink($filePath);
        }

        $stmt = $this->db->prepare("DELETE FROM barang WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // HANDLE UPLOAD IMAGE
    private function uploadImage($file)
    {
        if (empty($file['name'])) {
            return null;
        }

<<<<<<< HEAD
        // Validasi tipe file
        if (!in_array($file['type'], ALLOWED_TYPES)) {
            die("Error: File harus berupa PNG atau JPG.");
=======
        // Validasi tipe file - hanya JPG, JPEG, PNG
        $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($file['type'], $allowed_types)) {
            die("Error: File harus berupa JPG, JPEG, atau PNG saja.");
        }

        // Validasi extension file
        $allowed_ext = ['jpg', 'jpeg', 'png'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed_ext)) {
            die("Error: Ekstensi file harus JPG, JPEG, atau PNG saja.");
>>>>>>> 994a0ee (First commit)
        }

        // Validasi ukuran
        if ($file['size'] > MAX_UPLOAD_SIZE) {
<<<<<<< HEAD
            die("Error: Ukuran file terlalu besar.");
=======
            die("Error: Ukuran file terlalu besar (maksimal 2 MB).");
>>>>>>> 994a0ee (First commit)
        }

        // Tentukan nama file
        $filename = $file['name'];

        if (RENAME_FILE_ON_UPLOAD) {
<<<<<<< HEAD
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
=======
>>>>>>> 994a0ee (First commit)
            $filename = time() . "_" . uniqid() . "." . $ext;
        }

        $destination = UPLOAD_DIR . $filename;

        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            die("Gagal upload gambar.");
        }

        return $filename;
    }
}

?>