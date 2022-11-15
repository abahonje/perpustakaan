<?= $this->extend('templates/layout');  ?>
<?= $this->section('content'); ?>
<div class="col-12">
   <?= session()->getFlashdata('siswa'); ?>
   <a href="/siswa/create" class="btn btn-primary px-4 mb-3"><i class="fas fa-plus"></i> Tambah Data Siswa</a>
   <table class="table table-striped">
      <thead>
         <tr class="bg-info">
            <th>No.</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Email</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         <?php $no = 1;
         foreach ($siswa as $sis) : ?>
            <tr>
               <td><?= $no++; ?></td>
               <td><?= $sis->nis ?></td>
               <td><?= $sis->nama ?></td>
               <td><?= $sis->kelas ?></td>
               <td><?= $sis->email ?></td>
               <td>
                  <a href="" class="btn btn-info btn-sm detailSiswa" data-bs-toggle="modal" data-bs-target="#siswaModal" data-id="<?= $sis->id; ?>">
                     <i class="fas fa-eye"></i></a>
                  <a href="/siswa/<?= $sis->id; ?>/edit" class="btn btn-success btn-sm">
                     <i class="fas fa-edit"></i></a>
                  <a href="/siswa/<?= $sis->id; ?>/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin data siswa ini akan dihapus?')">
                     <i class="fas fa-trash-alt"></i></a>
               </td>
            </tr>
         <?php endforeach ?>
      </tbody>
   </table>
</div>

<!-- Modal -->
<div class="modal fade" id="siswaModal" tabindex="-1" aria-labelledby="siswaModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="siswaModalLabel">DETAIL DATA SISWA</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-4 text-center">
                  <img src="/uploads/default.png" alt="" width="75%" class="img-thumbnail rounded shadow">
               </div>
               <div class="col-8">
                  <table class="table table-striped table-borderless">
                     <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td id="nama">Vamella Anderson</td>
                     </tr>
                     <tr>
                        <td>NIS</td>
                        <td>:</td>
                        <td id="nis">123456789</td>
                     </tr>
                     <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td id="jk">Perempuan</td>
                     </tr>
                     <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td id="kelas">12 TSM</td>
                     </tr>
                     <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td id="email">vamella@gmail.com</td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
         </div>
      </div>
   </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script type="text/javascript">
   $(document).ready(function() {
      $('.detailSiswa').on('click', function() {
         const id = $(this).data('id');
         $.ajax({
            url: "<?= site_url('siswa/getSiswaById'); ?>",
            data: {
               'id': id
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
               // console.info(data);
               $('#nis').html(data.nis);
               $('#nama').html(data.nama);
               $('#email').html(data.email);
               $('#no_hp').html(data.no_hp);
               $('#kelas').html(data.kelas);
               let jk = (data.jk == 'L') ? 'Laki-laki' : 'Perempuan';
               $('#jk').html(jk);
               $('.img-thumbnail').attr('src', '/uploads/' + data.photo);
            }
         });
      })
   })
</script>
<?= $this->endSection(); ?>