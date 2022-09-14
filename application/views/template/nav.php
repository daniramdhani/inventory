<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<nav id="sidebar">
    <div class="p-4 pt-5">
        <a href="<?= site_url(); ?>" class="img logo rounded-circle mb-3" style="background-image: url(<?= base_url('assets/img/logo.jpg'); ?>);"></a>
        <ul class="list-unstyled components mb-5">

            <!-- <li <?= (strtolower($this->uri->segment(1)) == 'dashboard') ? 'class="active"' : ''; ?>>
                <a href="<?= site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li> -->
            <?php
            //tampilkan menu di bawah ini jika yang login admin
            if ($this->session->userdata('level') == 'admin') :
            ?>
                <li <?= (in_array(strtolower($this->uri->segment(1)), ['perusahaan', 'pelanggan', 'carabayar', 'operasional', 'wilayahbarangsatuanukuran', 'wilayahharga'])) ? 'class="active"' : ''; ?>>
                <a href="#pageMasterData" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-file-text-o"></i> Master Data
                </a>

                <ul class="collapse list-unstyled" id="pageMasterData">
                    <li <?= (strtolower($this->uri->segment(1)) == 'perusahaan') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('perusahaan'); ?>" <?= (strtolower($this->uri->segment(1)) == 'perusahaan') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Perusahaan
                        </a>
                    </li>
					                    
					<li <?= (in_array(strtolower($this->uri->segment(1)), ['pelanggan', 'tambah_pelanggan', 'edit_pelanggan'])) ? 'class="active"' : ''; ?>>
						<a href="<?= site_url('pelanggan'); ?>"><i class="fa fa-cubes"></i> Pelanggan</a>
					</li>
					
                    <li <?= (strtolower($this->uri->segment(1)) == 'carabayar') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('carabayar'); ?>" <?= (strtolower($this->uri->segment(1)) == 'carabayar') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Carabayar
                        </a>
                    </li>
                    <li <?= (strtolower($this->uri->segment(1)) == 'operasional') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('operasional'); ?>" <?= (strtolower($this->uri->segment(1)) == 'operasional') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Operasional
                        </a>
                    </li>
                    <li <?= (strtolower($this->uri->segment(1)) == 'wilayahbarangsatuanukuran') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('wilayahbarangsatuanukuran'); ?>" <?= (strtolower($this->uri->segment(1)) == 'wilayahbarangsatuanukuran') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Wilayah/Barang/Satuan/Ukuran
                        </a>
                    </li>
                    <li <?= (strtolower($this->uri->segment(1)) == 'wilayahharga') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('wilayahharga'); ?>" <?= (strtolower($this->uri->segment(1)) == 'wilayahharga') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Wilayah Dengan Harga
                        </a>
                    </li>
                </ul>

                <li <?= (in_array(strtolower($this->uri->segment(1)), ['buatlogin', 'ubahpassword'])) ? 'class="active"' : ''; ?>>
                <a href="#pageKelolaLogin" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-file-text-o"></i> Kelola Login
                </a>

                <ul class="collapse list-unstyled" id="pageKelolaLogin">
                    <li <?= (strtolower($this->uri->segment(1)) == 'buatlogin') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('buatlogin'); ?>" <?= (strtolower($this->uri->segment(1)) == 'buatlogin') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Buat Login
                        </a>
                    </li>
                    <li <?= (strtolower($this->uri->segment(1)) == 'ubahpassword') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('ubahpassword'); ?>" <?= (strtolower($this->uri->segment(1)) == 'ubahpassword') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Ubah Password
                        </a>
                    </li>
                </ul>

                <li <?= (in_array(strtolower($this->uri->segment(1)), ['pemesanan', 'pengiriman','penerimaan'])) ? 'class="active"' : ''; ?>>
                <a href="#pagepesankirimterima" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-file-text-o"></i> Pesan,Kirim Dan Terima
                </a>

                <ul class="collapse list-unstyled" id="pagepesankirimterima">
                    <li <?= (strtolower($this->uri->segment(1)) == 'pemesanan') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('pemesanan'); ?>" <?= (strtolower($this->uri->segment(1)) == 'pemesanan') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Pemesanan Barang
                        </a>
                    </li>
                    <li <?= (strtolower($this->uri->segment(1)) == 'pengiriman') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('pengiriman'); ?>" <?= (strtolower($this->uri->segment(1)) == 'pengiriman') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Pengiriman Barang
                        </a>
                    </li>
                    <li <?= (strtolower($this->uri->segment(1)) == 'penerimaan') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('penerimaan'); ?>" <?= (strtolower($this->uri->segment(1)) == 'penerimaan') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Penerimaan Barang
                        </a>
                    </li>
                </ul>

                <li <?= (in_array(strtolower($this->uri->segment(1)), ['pembayaran', 'pengembalian','pembayarankepabrik'])) ? 'class="active"' : ''; ?>>
                <a href="#pagebayarkembali" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-file-text-o"></i> Bayar dan Kembali 
                </a>

                <ul class="collapse list-unstyled" id="pagebayarkembali">
                    <li <?= (strtolower($this->uri->segment(1)) == 'pembayaran') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('pembayaran'); ?>" <?= (strtolower($this->uri->segment(1)) == 'pembayaran') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Pembayaran Barang
                        </a>
                    </li>
                    <li <?= (strtolower($this->uri->segment(1)) == 'pengembalian') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('pengembalian'); ?>" <?= (strtolower($this->uri->segment(1)) == 'pengembalian') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Pengembalian Barang
                        </a>
                    </li>
                    <li <?= (strtolower($this->uri->segment(1)) == 'pembayarankepabrik') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('pembayarankepabrik'); ?>" <?= (strtolower($this->uri->segment(1)) == 'pembayarankepabrik') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Pembayaran Barang Ke Pabrik
                        </a>
                    </li>
                </ul>

                <li <?= (in_array(strtolower($this->uri->segment(1)), ['laplabarugi', 'lappengiriman','lapprediksipemesanan','lappembayrankepakrik','lappengembalianbarang'])) ? 'class="active"' : ''; ?>>
                <a href="#pagelaporan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-file-text-o"></i> Laporan 
                </a>

                <ul class="collapse list-unstyled" id="pagelaporan">
                    <li <?= (strtolower($this->uri->segment(1)) == 'laplabarugi') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('laplabarugi'); ?>" <?= (strtolower($this->uri->segment(1)) == 'laplabarugi') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Laporan Laba Rugi
                        </a>
                    </li>
                    <li <?= (strtolower($this->uri->segment(1)) == 'lappengiriman') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('lappengiriman'); ?>" <?= (strtolower($this->uri->segment(1)) == 'lappengiriman') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Laporan Pengiriman Barang
                        </a>
                    </li>
                    <li <?= (strtolower($this->uri->segment(1)) == 'lapprediksipemesanan') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('lapprediksipemesanan'); ?>" <?= (strtolower($this->uri->segment(1)) == 'lapprediksipemesanan') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Laporan Prediksi Pemesanan
                        </a>
                    </li>
                    <li <?= (strtolower($this->uri->segment(1)) == 'lappembayrankepakrik') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('lappembayrankepakrik'); ?>" <?= (strtolower($this->uri->segment(1)) == 'lappembayrankepakrik') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Laporan Pembayaran Ke Pabrik
                        </a>
                    </li>
                    <li <?= (strtolower($this->uri->segment(1)) == 'lappengembalianbarang') ? 'class="active"' : ''; ?>>
                        <a href="<?= site_url('lappengembalianbarang'); ?>" <?= (strtolower($this->uri->segment(1)) == 'lappengembalianbarang') ? 'class="active"' : ''; ?>>
                            <i class="fa fa-angle-double-right"></i> Laporan Pengembalian Barang
                        </a>
                    </li>
                </ul>
            <?php
            endif;
            ?>            
        </ul>

        <div class="footer">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>

    </div>
</nav>