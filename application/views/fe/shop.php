                    <!--MAIN-->
                    <div class="col-md-9 order-2">

                        <!--MAIN PRODUK-->
                        <div class="row mb-5">
                            <?php foreach ($produk as $p): ?>
                            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="block-4 text-center border">
                                    <figure class="block-4-image">
                                        <a href="#"><img src="<?= base_url('assets/frontend/images/cloth_1.jpg'); ?>"
                                                alt="Image placeholder" class="img-fluid"></a>
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a href="#"><?= substr($p->nama_produk, 0, 18); ?></a></h3>
                                        <p class="mb-0"><?= $p->kategori_id; ?></p>
                                        <p class="text-primary font-weight-bold"><?= $p->status_id; ?></p>
                                        <p class="text-primary font-weight-bold"><?= $p->harga; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <!--PAGINATION-->
                        <div class="row" data-aos="fade-up">
                            <div class="col-md-12 text-center">
                                <?php echo $this->pagination->create_links(); ?>
                            </div>
                        </div>

                        <!--PAGINATION
                        <div class="row" data-aos="fade-up">
                            <div class="col-md-12 text-center">
                                <div class="site-block-27">
                                    <ul>
                                        <li><a href="#">&lt;</a></li>
                                        <li class="active"><span>1</span></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">&gt;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                            -->

                    </div>