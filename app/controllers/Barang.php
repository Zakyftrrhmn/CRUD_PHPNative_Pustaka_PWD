<?php

class Barang extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Barang';
        $data['barang'] = $this->model('BarangModel')->getAllBarang();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Barang';
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('barang/create', $data);
        $this->view('templates/footer');
    }

    public function simpanBarang()
    {
        $photo = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $upload_dir = 'img/barang/';
        $photo_target = $upload_dir . basename($photo);

        if (move_uploaded_file($photo_tmp, $photo_target)) {
            $_POST['photo'] = $photo;

            if ($this->model('BarangModel')->tambahBarang($_POST) > 0) {
                Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
                header('location:' . base_url . '/barang');
                exit;
            } else {
                Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
                header('location:' . base_url . '/barang');
                exit;
            }
        } else {
            Flasher::setMessage('Gagal', 'upload photo', 'danger');
            header('location:' . base_url . '/barang');
            exit;
        }
    }


    public function edit($id)
    {
        $data['title'] = 'Edit Barang';
        $data['barang'] = $this->model('BarangModel')->getBarangById($id);
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('barang/edit', $data);
        $this->view('templates/footer');
    }

    public function updateBarang()
    {
        $photo = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $upload_dir = 'img/barang/';
        $photo_target = $upload_dir . basename($photo);

        if (!empty($photo_tmp)) {
            if (move_uploaded_file($photo_tmp, $photo_target)) {
                $_POST['photo'] = $photo;
            } else {
                Flasher::setMessage('Gagal', 'upload photo', 'danger');
                header('location:' . base_url . '/barang');
                exit;
            }
        } else {
            if (isset($_POST['photo_lama'])) {
                $_POST['photo'] = $_POST['photo_lama'];
            } else {
                $_POST['photo'] = null;
            }
        }

        if ($this->model('BarangModel')->updateDataBarang($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/barang');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/barang');
            exit;
        }
    }



    public function hapus($id)
    {
        if ($this->model('BarangModel')->deleteBarang($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/barang');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location:' . base_url . '/barang');
            exit;
        }
    }

    public function cari()
    {
        $data['title'] = 'Data Barang';
        $data['barang'] = $this->model('BarangModel')->cariBarang();
        $data['key'] = $_POST['key'];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }
}
