<?php

class BarangModel
{

    private $table = 'barang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBarang()
    {
        $this->db->query('SELECT barang.*, kategori.nama_kategori FROM ' . $this->table . ' JOIN kategori ON kategori.id = barang.kategori_id');
        return $this->db->resultSet();
    }

    public function getBarangById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahBarang($data)
    {
        $query = "INSERT INTO barang (nama_barang, harga, stok, kategori_id, photo) 
                  VALUES (:nama_barang, :harga, :stok, :kategori_id, :photo)";
        $this->db->query($query);
        $this->db->bind('nama_barang', $data['nama_barang']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->bind('photo', $data['photo']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataBarang($data)
    {
        $query = "UPDATE barang SET nama_barang = :nama_barang, harga = :harga, stok = :stok, kategori_id = :kategori_id, photo = :photo WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_barang', $data['nama_barang']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->bind('photo', $data['photo']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteBarang($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariBarang()
    {
        $key = $_POST['key'];

        // Query yang benar
        $this->db->query("SELECT barang.*, kategori.nama_kategori FROM " . $this->table . " 
                          JOIN kategori ON kategori.id = barang.kategori_id 
                          WHERE barang.nama_barang LIKE :key");

        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
