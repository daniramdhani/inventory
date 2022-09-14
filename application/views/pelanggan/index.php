<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12 col-md-10">
        <h4 class="mb-0"><i class="fa fa-cubes"></i> Data Pelanggan</h4>
    </div>
    <div class="col-sm-12 col-md-2">
        <!-- <a href="<?= site_url('tambah_pelanggan'); ?>" class="btn btn-success btn-sm btn-block">Tambah Data</a> -->
        <button type="button" class="btn btn-success btn-sm btn-block" onclick="add('Data_pelanggan')">
            Tambah Data
        </button>
    </div>
</div>
<hr class="mt-0" />
<?php
//tampilkan pesan success
if ($this->session->flashdata('success')) {
    echo '<div class="alert alert-success" role="alert">
    ' . $this->session->flashdata('success') . '
  </div>';
}

//tampilkan pesan error
if ($this->session->flashdata('error')) {
    echo '<div class="alert alert-danger" role="alert">
    ' . $this->session->flashdata('error') . '
  </div>';
}
?>
<!-- Modal -->
<div class="modal fade" id="modalData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Data Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="#" id="formData">
                    <div class="row ">
                        <div class="form-group col-md-6">
                            <label for="status">Kode Pelanggan</label>
                            <input type="text" class="form-control" disabled id="kode" name="kode" style="text-align:center" >
    
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan" autofocus>
    
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="status">Alamat</label>
                            <input type="text" class="form-control col-sm-12" id="alamat" name="alamat" placeholder="Alamat">
    
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="status">Penanggung Jawab</label>
                            <input type="text" class="form-control" id="penanggungjawab" name="penanggungjawab" placeholder="Penanggung Jawab">
    
                            <div class="invalid-feedback"></div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="status">No. Telp</label>
                            <input type="text" class="form-control" id="notelp" name="notelp" placeholder="No. Telp">
                            
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Sts. Pelanggan</label>
                            <select name="stspelanggan" id="stspelanggan" class="form-control form-control-sm" title="Pilih Status Pelanggan">
                                <option value="">-- Pilih --</option>
                                <option value="0">Gudang</option>
                                <option value="1">Toko</option>
                            </select>
                            
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Wilayah</label>
                            <select name="wilayah" id="wilayah" class="form-control form-control-sm" title="Pilih Wilayah">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($wilayah['data'] as $key) { ?>
                                    <option value=<?= $key[0]; ?>><?= $key[1]; ?></option>
                                <?php }  ?>
                            </select>
                            
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Tgl. Bergabung</label>
                            <input type="date" class="form-control" id="tglbergabung" name="tglbergabung" value="<?= date("Y-m-d");?>">
                            
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6" hidden>
                            <label for="status">Tgl. Berakhir</label>
                            <input type="date" class="form-control" id="tglbergabung" name="tglbergabung">
                        </div>
                    </div>
                    </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btnSave" onclick="save('Data_pelanggan')">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-sm table-hover table-striped" id="tables">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Kode Pelanggan</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Penanggung Jawab</th>
                <th scope="col">No. Telepon</th>
                <th scope="col">Sts. Pelanggan</th>
                <th scope="col">Wilayah</th>
                <th scope="col">Tgl. Bergabung</th>
                <th scope="col">Tgl. Berakhir</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>