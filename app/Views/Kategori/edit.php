<?= $this->extend('templates/layout'); ?>
<?= $this->section('content'); ?>
<div class="col-6">
    <?= form_open('/kategori/update'); ?>
    <h6 class="lead mb-3">Silahkan lengkapi form berikut ini :</h6>
    <?= csrf_field(); ?>
    <input type="hidden" name="id" id="id" value="<?= $kategori->id; ?>">
    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <input type="text" class="form-control <?= $validation->getError('kategori') ? 'is-invalid' : ''; ?>" name="kategori" id="kategori" value="<?= $kategori->kategori; ?>" required>
        <small class="invalid-feedback"><?= $validation->getError('kategori'); ?></small>
    </div>
    <div class="mb-5">
        <label for="keterangan" class="form-label">Keterangan</label>
        <input type="text" class="form-control <?= $validation->getError('keterangan') ? 'is-invalid' : ''; ?>" name="keterangan" id="keterangan" value="<?= $kategori->keterangan; ?>" required>
        <small class="invalid-feedback"><?= $validation->getError('keterangan'); ?></small>
    </div>
    <div class="mb-3">
        <button type="submit" name="submit" class="btn btn-info px-4">
            <i class="fas fa-save"></i> Simpan
        </button>
        <a href="/kategori" class="btn btn-warning px-4 float-end">
            <i class="fas fa-undo"></i> Kembali
        </a>
    </div>
    <?= form_close(); ?>
</div>
<?= $this->endSection(); ?>