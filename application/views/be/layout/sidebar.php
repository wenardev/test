<div class="left-side-bar">
    <div class="brand-logo">
        <a href="#">
            <img src="<?= base_url('assets/backend/vendors/images/deskapp-logo-white.svg'); ?>" alt=""
                class="light-logo">
        </a>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="<?= base_url('dashboard'); ?>"
                        class="<?= ($menu_active == 'index') ? 'dropdown-toggle no-arrow active' : 'dropdown-toggle no-arrow'; ?>">
                        <span class="micon fa fa-dashboard"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('dashboard/produk'); ?>"
                        class="<?= ($menu_active == 'produk') ? 'dropdown-toggle no-arrow active' : 'dropdown-toggle no-arrow'; ?>">
                        <span class="micon dw dw-box"></span><span class="mtext">Produk</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('dashboard/kategori'); ?>"
                        class="<?= ($menu_active == 'kategori') ? 'dropdown-toggle no-arrow active' : 'dropdown-toggle no-arrow'; ?>">
                        <span class="micon dw dw-layers1"></span><span class="mtext">Kategori</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>