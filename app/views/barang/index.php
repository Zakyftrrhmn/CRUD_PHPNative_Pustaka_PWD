<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $data['title']; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <?php Flasher::Message(); ?>
            </div>
        </div>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title'] ?></h3> <a href="<?= base_url; ?>/barang/tambah" class="btn float-right btn-xs btn btn-primary">Tambah Barang</a>
            </div>
            <div class="card-body">

                <form action="<?= base_url; ?>/barang/cari" method="post">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="" name="key">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
                                    <a class="btn btn-outline-danger" href="<?= base_url; ?>/barang">Reset</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Kategori</th>
                            <th>Photo</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['barang'] as $row) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['nama_barang']; ?></td>
                                <td><?= $row['harga']; ?></td>
                                <td><?= $row['stok']; ?></td>
                                <td><?= $row['nama_kategori']; ?></td>
                                <td>
                                    <img src="<?= base_url; ?>/img/barang/<?= $row['photo']; ?>" alt="<?= $row['nama_barang']; ?>" width="100" height="100">
                                </td>
                                <td>
                                    <a href="<?= base_url; ?>/barang/edit/<?= $row['id'] ?>" class="badge badge-info ">Edit</a> <a href="<?= base_url; ?>/barang/hapus/<?= $row['id'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->