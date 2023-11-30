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
                        Selamat datang di halaman dashboard <div class="weight-600 font-30 text-blue">Admin!
                        </div>
                    </h4>
                    <p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde
                        hic non repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure
                        fugiat, veniam non quaerat mollitia animi error corporis.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <i class="dw dw-box fa-4x text-success"></i>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0"><?= $count_produk; ?></div>
                            <div class="weight-600 font-14">Jumlah Produk</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data"><i class="icon-copy "></i>
                            <i class="dw dw-layers1 fa-4x text-warning"></i>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0"><?= $count_kategori; ?></div>
                            <div class="weight-600 font-14">Jumlah Kategori</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <i class="dw dw-tag1 fa-4x text-primary"></i>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0"><?= $count_produk_dijual; ?></div>
                            <div class="weight-600 font-14">Produk di jual</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <i class="dw dw-delete fa-4x text-danger"></i>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0"><?= $count_produk_tidak_dijual; ?></div>
                            <div class="weight-600 font-14">Produk tidak di jual</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Daftar Produk</h4>
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
                                <?= $p->status_id; ?></td>

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

<!--FOOTER-->