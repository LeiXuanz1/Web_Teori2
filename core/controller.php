<?php

class Controller
{
    /**
     * Memuat view
     * Contoh: $this->view('barang/index', ['data' => $data]);
     */
    public function view($view, $data = [])
    {
        if (!empty($data) && is_array($data)) {
            extract($data);
        }

        $viewPath = "../app/views/" . $view . ".php";

        if (file_exists($viewPath)) {
            require "../app/views/layouts/header.php";
            require $viewPath;
            require "../app/views/layouts/footer.php";
        } else {
            die("View file tidak ditemukan: " . $viewPath);
        }
    }

    /**
     * Memuat model
     * Contoh: $barangModel = $this->model('Barang');
     */
    public function model($model)
    {
        $modelPath = "../app/models/" . $model . ".php";

        if (file_exists($modelPath)) {
            require_once $modelPath;
            return new $model();
        }

        die("Model tidak ditemukan: " . $modelPath);
    }
}

?>