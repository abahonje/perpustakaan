<?= $this->extend('templates/layout'); ?>
<?= $this->section('content'); ?>
<div class="col-6">
    <?= form_open('/buku/save'); ?>
    <h6 class="lead mb-3">Silahkan lengkapi form berikut ini :</h6>
    <?= csrf_field(); ?>
    <div class="mb-3">
        <label for="kode" class="form-label">Kode Buku</label>
        <input type="text" class="form-control" name="kode" id="kode" value="<?= $getKodeBuku; ?>" readonly>
    </div>
    <div class="mb-3">
        <label for="judul" class="form-label">Judul Buku</label>
        <input type="text" class="form-control <?= $validation->getError('judul') ? 'is-invalid' : ''; ?>" name="judul" id="judul" placeholder="Judul Buku" required>
        <small class="invalid-feedback"><?= $validation->getError('judul'); ?></small>
    </div>
    <div class="mb-3">
        <label for="penerbit" class="form-label">Penerbit</label>
        <input type="text" class="form-control <?= $validation->getError('penerbit') ? 'is-invalid' : ''; ?>" name="penerbit" id="penerbit" placeholder="Penerbit" required>
        <small class="invalid-feedback"><?= $validation->getError('penerbit'); ?></small>
    </div>
    <div class="mb-3">
        <label for="tahun" class="form-label">Tahun Terbit</label>
        <select class="form-select" name="tahun" id="tahun" required>
            <option selected>Pilih Tahun</option>
            <?php for ($i = 2010; $i < 2023; $i++) : ?>
                <option value="<?= $i; ?>"><?= $i; ?></option>
            <?php endfor; ?>
        </select>
        <small class="invalid-feedback"><?= $validation->getError('tahun'); ?></small>
    </div>
    <div class="mb-3">
        <label for="stok" class="form-label">Stok</label>
        <input type="number" class="form-control <?= $validation->getError('stok') ? 'is-invalid' : ''; ?>" name="stok" id="stok" placeholder="Stok" required>
        <small class="invalid-feedback"><?= $validation->getError('stok'); ?></small>
    </div>
    <div class="mb-5">
        <label for="id_kategori" class="form-label">Kategori</label>
        <select class="form-select" name="id_kategori" id="id_kategori" required>
            <option value="">Pilih Kategori</option>
            <?php foreach ($kategori as $kat) : ?>
                <option value="<?= $kat->id; ?>"><?= $kat->kategori; ?></option>
            <?php endforeach; ?>
        </select>
        <small class="invalid-feedback"><?= $validation->getError('id_kategori'); ?></small>
    </div>
    <div class="mb-3">
        <button type="submit" name="submit" class="btn btn-info px-4">
            <i class="fas fa-save"></i> Simpan
        </button>
        <a href="/buku" class="btn btn-warning px-4 float-end">
            <i class="fas fa-undo"></i> Kembali
        </a>
    </div>

    <?= form_close(); ?>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script type="text/javascript">
    const kategori = document.querySelector('#id_kategori');
    const kode = document.querySelector('#kode');
    var jadiBuku = kode.value.slice(0, 5);
    const gBuku = jadiBuku + '-G';
    const sBuku = jadiBuku + '-S';
    const uBuku = jadiBuku + '-U';
    const cBuku = jadiBuku + '-C';
    kategori.addEventListener('change', function() {
        if (kategori.value == '1') {
            kode.value = sBuku;
        } else if (kategori.value == '2') {
            kode.value = gBuku;
        } else if (kategori.value == '3') {
            kode.value = uBuku;
        } else {
            kode.value = cBuku;
        }
    });
</script>
<?= $this->endSection(); ?>