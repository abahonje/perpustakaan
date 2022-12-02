<?= $this->extend('templates/layout');  ?>
<?= $this->section('content'); ?>
<div class="col-12">
    <div class="card p-4 shadow-md">
        <div class="row">
            <div class="col-12">
                <?= session()->getFlashdata('peminjaman'); ?>
                <form action="/peminjaman" method="post">
                    <div class="mb-3 row">
                        <label for="id_siswa" class="col-sm-3 col-form-label">Nama Siswa</label>
                        <div class="col-sm-9">
                            <select name="id_siswa" id="id_siswa" class="form-select" required>
                                <option value="">Pilih Siswa</option>
                                <?php foreach ($siswa as $sis) : ?>
                                    <option value="<?= $sis->id; ?>"><?= $sis->nis; ?> - <?= $sis->nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_buku" class="col-sm-3 col-form-label">Judul Buku</label>
                        <div class="col-sm-9">
                            <select name="id_buku" id="id_buku" class="form-select" required>
                                <option value="">Pilih Buku</option>
                                <?php foreach ($buku as $bk) : ?>
                                    <option value="<?= $bk->id; ?>"><?= $bk->kode; ?> - <?= $bk->judul; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary px-5 float-end">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
    <table class="table table-striped mt-4">
        <thead>
            <tr class="bg-info">
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status Peminjaman</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($peminjaman as $p) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $p->nama; ?></td>
                    <td><?= $p->judul; ?></td>
                    <td><?= $p->tgl_pinjam; ?></td>
                    <td><?= $p->tgl_kembali; ?></td>
                    <td class="text-center">
                        <?php if ($p->status == 'aktif') : ?>
                            <span class="badge bg-success">Aktif</span>
                        <?php else :  ?>
                            <span class="badge bg-secondary">Sudah Kembali</span>
                        <?php endif ?>
                    </td>
                    <td>
                        <a href="/peminjaman/<?= $p->id; ?>/kembali" class="btn btn-sm btn-warning <?= ($p->status == 'nonaktif') ? 'disabled' : ''; ?>" onclick="return confirm('Kembalikan data peminjaman ini?')">Kembalikan</a>
                        <a href="/peminjaman/<?= $p->id; ?>/delete" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data peminjaman ini akan dihapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>