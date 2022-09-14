<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12 col-md-10">
        <h4 class="mb-0"><i class="fa fa-cubes"></i> Tambah Data Pelanggan</h4>
    </div>
</div>
<hr class="mt-0" />
<?= form_open(); ?>
<div class="col-md-8">

    <div class="form-group row">
        <label for="kd_pelanggan" class="col-sm-3 col-form-label">Kode Pelanggan</label>
        <div class="col-sm-9 col-md-3">
            <input type="text" disabled class="form-control form-control-sm <?= (form_error('kd_pelanggan')) ? 'is-invalid' : ''; ?>" id="kd_pelanggan" required name="kd_pelanggan" placeholder="Kode Pelanggan" value="<?= set_value('kd_pelanggan'); ?>">
            <div class="invalid-feedback">
                <?= form_error('kd_pelanggan', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="namapelanggan" class="col-sm-3 col-form-label">Nama Pelanggan</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm <?= (form_error('nama_pelanggan')) ? 'is-invalid' : ''; ?>" id="nama_pelanggan" name="nama_pelanggan" required autofocus placeholder="Nama Pelanggan" value="<?= set_value('nama_pelanggan'); ?>">
            <div class="invalid-feedback">
                <?= form_error('nama_pelanggan', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm <?= (form_error('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" placeholder="Alamat" required value="<?= set_value('alamat'); ?>">
            <div class="invalid-feedback">
                <?= form_error('alamat', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="penanggungjawab" class="col-sm-3 col-form-label">Penanggung Jawab</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm <?= (form_error('penanggungjawab')) ? 'is-invalid' : ''; ?>" id="penanggungjawab" name="penanggungjawab" required placeholder="Penanggung Jawab" value="<?= set_value('penanggungjawab'); ?>">
            <div class="invalid-feedback">
                <?= form_error('penanggungjawab', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="notelp" class="col-sm-3 col-form-label">No. Telp</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm <?= (form_error('notelp')) ? 'is-invalid' : ''; ?>" id="notelp" name="notelp" placeholder="No. Telp" required value="<?= set_value('notelp'); ?>">
            <div class="invalid-feedback">
                <?= form_error('notelp', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="stspelanggan" class="col-sm-3 col-form-label">Sts. Pelanggan</label>
        <div class="col-sm-9">
            <select name="stspelanggan" id="stspelanggan" class="form-control form-control-sm" title="Pilih Status Pelanggan">
                <option value="">-- Pilih --</option>
                <option value="0">Gudang</option>
                <option value="1">Toko</option>
            </select>

            <div class="invalid-feedback">
                <?= form_error('stspelanggan', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="wilayah" class="col-sm-3 col-form-label">Wilayah</label>
        <div class="col-sm-9">
            
            <select name="wilayah" id="wilayah" class="form-control form-control-sm" title="Pilih Wilayah">
                <option value="">-- Pilih --</option>
            </select>

            <div class="invalid-feedback">
                <?= form_error('wilayah', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="tglbergabung" class="col-sm-3 col-form-label">Tgl. Bergabung</label>
        <div class="col-sm-9">
            <input type="date" class="form-control form-control-sm <?= (form_error('tglbergabung')) ? 'is-invalid' : ''; ?>" id="tglbergabung" name="tglbergabung" placeholder="Tgl. Bergabung" value="<?= date('d-m-Y') ?>" >
            <div class="invalid-feedback">
                <?= form_error('tglbergabung', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="tglberakhir" class="col-sm-3 col-form-label">Tgl. Berakhir</label>
        <div class="col-sm-9">
            <input type="date" class="form-control form-control-sm <?= (form_error('tglberakhir')) ? 'is-invalid' : ''; ?>" id="tglberakhir" name="tglberakhir" placeholder="Tgl. Berakhir" >
            <div class="invalid-feedback">
                <?= form_error('tglberakhir', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-9 offset-md-3">
            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-sm">Tambah Data</button>
            <button type="button" class="btn btn-light btn-sm" onclick="window.history.back()">Kembali</button>
        </div>
    </div>
</div>
<?= form_close(); ?>