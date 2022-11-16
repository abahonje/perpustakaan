<?= $this->extend('templates/layout');  ?>
<?= $this->section('content'); ?>
<div class="col-md-6">
    <?= form_open_multipart('/siswa/update'); ?>
    <h6 class="lead mb-3">Silahkan lengkapi form berikut ini :</h6>
    <?= csrf_field(); ?>
    <input type="hidden" name="id" id="id" value="<?= $siswa->id; ?>">
    <div class="form-floating mb-3">
        <input type="number" class="form-control <?= ($validation->getError('nis')) ? 'is-invalid' : ''; ?>" name="nis" id="nis" placeholder="Nomor Induk Siswa" value="<?= $siswa->nis; ?>">
        <label for="nis">Nomor Induk Siswa</label>
        <small class="invalid-feedback"><?= $validation->getError('nis'); ?></small>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control <?= ($validation->getError('nama')) ? 'is-invalid' : ''; ?>" name="nama" id="nama" placeholder="Nama Lengkap" value="<?= $siswa->nama; ?>" required>
        <label for="nama">Nama Lengkap</label>
        <small class="invalid-feedback"><?= $validation->getError('nama'); ?></small>
    </div>
    <div class="form-floating mb-3">
        <select class="form-select" name="jk" id="jk" required>
            <option value="" selected>Pilih Jenis Kelamin</option>
            <option value="L" <?= $siswa->jk == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
            <option value="P" <?= $siswa->jk == 'P' ? 'selected' : ''; ?>>Perempuan</option>
        </select>
        <label for="floatingSelect">Jenis Kelamin</label>
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control <?= ($validation->getError('email')) ? 'is-invalid' : ''; ?>" name="email" id="email" placeholder="Alamat Email" value="<?= $siswa->email; ?>" required>
        <label for="email">Alamat Email</label>
        <small class="invalid-feedback"><?= $validation->getError('email'); ?></small>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?= $siswa->kelas; ?>" required>
        <label for="kelas">Kelas</label>
    </div>
    <div class="form-floating mb-4">
        <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Handphone/WA" value="<?= $siswa->no_hp; ?>" required>
        <label for="no_hp">Nomor Handphone</label>
    </div>
</div>
<div class="col-md-6">
    <h6 class="lead mb-3">Silahkan upload photo siswa :</h6>
    <div class="form-group mb-3">
        <input type="hidden" name="photo_lama" id="photo_lama" value="<?= $siswa->photo; ?>">
        <input type="file" class="form-control py-3 <?= ($validation->getError('photo')) ? 'is-invalid' : ''; ?>" name="photo" id="photo">
        <small class="invalid-feedback"><?= $validation->getError('photo'); ?></small>
    </div>
    <img src="/uploads/<?= $siswa->photo; ?>" alt="" class="img-preview mb-4" width="200">
    <div>
        <button type="submit" class="btn btn-info px-5 py-3"><i class="fas fa-save"></i> Simpan</button>
        <a href="/siswa" class="btn btn-warning px-5 py-3 float-end"><i class="fas fa-undo"></i> Kembali</a>
    </div>
    <?= form_close(); ?>
</div>
<?= $this->endSection(); ?>

<!-- Menangkap gambar yang di upload -->
<?= $this->section('script'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#photo').on('change', () => {
            const photo = document.querySelector('#photo');
            const imgPreview = document.querySelector('.img-preview');

            const filePhoto = new FileReader()
            filePhoto.readAsDataURL(photo.files[0])

            filePhoto.onload = (e) => {
                imgPreview.src = e.target.result
            }
        })
    });
</script>
<?= $this->endSection(); ?>