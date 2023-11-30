                    <!--SIDEBAR CATEGORIES-->
                    <div class="col-md-3 order-1 mb-5 mb-md-0">
                        <div class="border p-4 rounded mb-4">

                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Kategori</h3>
                            <ul class="list-unstyled mb-0">
                                <?php foreach ($kategori as $k): ?>
                                <li class="mb-1">
                                    <a href="#" class="d-flex">
                                        <span><?= $k->nama_kategori; ?></span>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>

                        </div>
                    </div>

                    </div>

                    </div>
                    </div>