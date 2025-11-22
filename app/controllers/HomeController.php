<?php

class HomeController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $this->view("home/index");
    }
}
=======
        // Load model
        $barangModel = $this->model('barang');

        // Get statistics
        $allBarang = $barangModel->getAll();
        $totalBarang = count($allBarang);
        
        $totalNilai = 0;
        $totalStok = 0;

        foreach ($allBarang as $barang) {
            $totalNilai += ($barang['harga'] * $barang['stok']);
            $totalStok += $barang['stok'];
        }

        // Prepare data for view
        $data = [
            'totalBarang' => $totalBarang,
            'totalNilai' => $totalNilai,
            'totalStok' => $totalStok

        ];

        // Send data to view
        $this->view("home/index", $data);
    }
}
>>>>>>> 994a0ee (First commit)
