<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProduksiModel;

class Produksi extends BaseController
{
    public function index()
    {
        // $result = mysqli_query($conn, "SELECT DISTINCT invoice, kode_customer, status, kode_produk, qty,terima,tolak, cek FROM produksi");
        $produksi = new ProduksiModel();
        $result = $produksi->distinct()->findAll();
        $data = [
            'title' => 'Produksi',
            'result' => $result,
        ];
        return view('admin/produksi', $data);
    }

    public function detail($invoice)
    {
        // $result = mysqli_query($conn, "SELECT * FROM produksi WHERE invoice = '$invoice'");
        $db = \Config\Database::connect();
        // get all produksi table join with customer table
        $result = $db->table('produksi')
            ->join('customer', 'customer.kode_customer = produksi.kode_customer')
            ->where('invoice', $invoice)
            ->get()
            ->getResultArray();
        
        
        
        $data = [
            'title' => 'Detail Produksi',
            'result' => $result,
        ];
        return view('admin/detailorder', $data);
    }

    public function tolak($invoice){
        // "UPDATE produksi set tolak = '1', terima='2' WHERE invoice = '$inv'"
        $db = \Config\Database::connect();
        $db->table('produksi')
            ->set('status', 'Pesanan Ditolak')
            ->set('tolak', '1')
            ->set('terima', '2')
            ->where('invoice', $invoice)
            ->update();
        return redirect()->to(base_url('admin/produksi'))->with('success', 'pesanan ditolak');
    }

    public function terima($invoice){
        $db = \Config\Database::connect();
        $db->table('produksi')
            ->set('status', 'Pesanan Diterima (Siap Kirim)')
            ->set('terima', '1')
            ->where('invoice', $invoice)
            ->update();
        return redirect()->to(base_url('admin/produksi'))->with('success', 'pesanan diterima, bahan baku telah dikurangi');
    }
}
