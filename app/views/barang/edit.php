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
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url; ?>/barang/updateBarang" method="POST"
                enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $data['barang']['id']; ?>">
                <input type="hidden" name="photo_lama" value="<?= $data['barang']['photo']; ?>">

                <div class="card-body">
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" class="form-control" value="<?= $data['barang']['nama_barang']; ?>" name="nama_barang">
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" value="<?= $data['barang']['harga']; ?>" name="harga">
                    </div>

                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" value="<?= $data['barang']['stok']; ?>" name="stok">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori_id">
                            <option value="">Pilih</option>
                            <?php foreach ($data['kategori'] as $row): ?>
                                <option value="<?= $row['id']; ?>" <?php if ($data['barang']['kategori_id'] == $row['id']) {
                                                                        echo "selected";
                                                                    } ?>><?= $row['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="photo">Foto Barang</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                        <img src="<?= base_url; ?>/img/barang/<?= $data['barang']['photo']; ?>" alt="<?= $data['barang']['nama_barang']; ?>" width="100">

                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->