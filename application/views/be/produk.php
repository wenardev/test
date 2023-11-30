<!--SIDEBAR-->


<!--MAIN CONTENT-->
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/backend/vendors/images/banner-img.png'); ?>" alt="">
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Selamat datang di halaman produk <div class="weight-600 font-30 text-blue">Admin!</div>
                    </h4>
                    <p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde
                        hic non repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure
                        fugiat, veniam non quaerat mollitia animi error corporis.</p>
                </div>
            </div>
        </div>

        <?= $this->session->flashdata('success'); ?>
        <?= $this->session->flashdata('error'); ?>
        <?= form_error('nama_produk', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>', '</div>'); ?>
        <?= form_error('harga', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>', '</div>'); ?>
        <?= form_error('kategori_id', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>', '</div>'); ?>
        <?= form_error('status_id', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>', '</div>'); ?>
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Daftar Produk</h4>
                <a class="btn btn-primary" data-toggle="modal" data-target="#tambahdata">
                    <i class="fa fa-plus-square text-white" aria-hidden="true"></i>
                </a>
            </div>

            <div class="pb-20">
                <table id="produk_table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($produk as $p): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $p->nama_produk; ?></td>
                            <td><?= $p->harga; ?></td>
                            <td><?= $p->kategori_id; ?></td>
                            <td class="<?= $p->status_id == 'bisa dijual' ? 'text-primary' : 'text-danger'; ?>">
                                <?= $p->status_id; ?>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                        role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" data-toggle="modal"
                                            data-target="#ubah<?= $p->id_produk; ?>">
                                            <i class="dw dw-edit2"></i> Edit
                                        </a>
                                        <a class="dropdown-item" data-toggle="modal"
                                            data-target="#hapus<?= $p->id_produk ?>">
                                            <i class="dw dw-delete-3"></i>Hapus
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>


        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By <a href="#" target="_blank">Ankit
                Hingarajiya</a>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH DATA-->
<div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="tambahdataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahdataLabel">Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('dashboard/produk_create'); ?>" method="POST">
                <div class="modal-body">
                    <div class="col-lg">
                        <div class="form-group">
                            <label class="form-control-label" for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                placeholder="Inputkan data..." required
                                oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="harga">Harga Produk</label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                placeholder="Inputkan data..." required
                                oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="kategori_id">Kategori</label>
                            <select id="kategori_id" name="kategori_id" class="form-control">
                                <option value="">Pilih</option>
                                <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['nama_kategori']; ?>">
                                    <?= $k['nama_kategori']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="status_id">Status</label>
                            <select id="status_id" name="status_id" class="form-control">
                                <option value="">Pilih</option>
                                <?php foreach ($status as $k) : ?>
                                <option value="<?= $k['nama_status']; ?>">
                                    <?= $k['nama_status']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--BATASA MODAL TAMBAH DATA -->

<!-- MODAL UBAH DATA -->
<?php $i = 0;
foreach ($produk as $p) : $i++ ?>
<div class="modal fade" id="ubah<?= $p->id_produk ?>" tabindex="-1" aria-labelledby="ubahdataLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ubahdataLabel">Form Ubah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('dashboard/produk_update/' . $p->id_produk) ?>" method="post">
                <input type="hidden" name="_method" value="put">
                <div class="modal-body">
                    <div class="col-lg">
                        <div class="form-group">
                            <label class="form-control-label" for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                value="<?= $p->nama_produk ?>" placeholder="Inputkan data..." required
                                oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="harga">Harga Produk</label>
                            <input type="number" class="form-control" id="harga" name="harga" value="<?= $p->harga ?>"
                                placeholder="Inputkan data..." required
                                oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="kategori_id">Kategori</label>
                            <select id="kategori_id" name="kategori_id" class="form-control" required
                                oninvalid="this.setCustomValidity('Data tidak boleh kosong')"
                                oninput="setCustomValidity('')">
                                <option value="">Pilih</option>
                                <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['nama_kategori']; ?>"
                                    <?= ($k['nama_kategori'] == $p->kategori_id) ? 'selected' : ''; ?>>
                                    <?= $k['nama_kategori']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="status_id">Status</label>
                            <select id="status_id" name="status_id" class="form-control" required
                                oninvalid="this.setCustomValidity('Data tidak boleh kosong')"
                                oninput="setCustomValidity('')">
                                <option value="">Pilih</option>
                                <?php foreach ($status as $s) : ?>
                                <option value="<?= $s['nama_status']; ?>"
                                    <?= ($s['nama_status'] == $p->status_id) ? 'selected' : ''; ?>>
                                    <?= $s['nama_status']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- BATASA MODAL UBAH DATA -->

<!-- Modal Hapus Data-->
<?php $i = 0;
foreach ($produk as $p) : $i++ ?>
<form action="<?php echo site_url('dashboard/produk_delete'); ?>" method="post">
    <div class="modal fade" id="hapus<?= $p->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="hapusLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger" id="hapusLabel">Peringatan <i
                            class="ion-information-circled"></i></h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <input type="hidden" name="nik" class="nik" required>
                <div class="modal-body">Yakin ingin menghapus data?</div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                    <a type="submit" href="<?php echo site_url('dashboard/produk_delete/') . $p->id_produk; ?>"
                        class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</form>
<?php endforeach; ?>
<!-- Batas Modal Hapus -->

<!--FOOTER-->