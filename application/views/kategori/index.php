<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

 <?php if (validation_errors()) :  ?>
    <div class="alert alert-danger" role="alert">
      <?= validation_errors(); ?>
    </div>
  <?php endif; ?>
  <!-- hasil sukses -->
  <?= $this->session->flashdata('message'); ?>

  <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Tambah Kab/Kota</a>

  <!-- DataTales -->
  <div class="card shadow mb-20">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary ">Data Kabupaten/kota</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover display nowrap dataTable dtr-inline table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0" style="text-align:center">
         <thead>
            <tr>
              <th colspan="1">No</th>
              <th colspan="1">Nama Kab/Kota</th>
              <th colspan="1">Aksi</th>
              

            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($kabKota as $kk) : ?>
              <tr>
                <td scope=" row"><?= $i; ?></td>
                <td><?= $kk['namakabKota']; ?></td>
                <td>
                    <a href=" <?= base_url('kategori/edit/') . $kk['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                <a href="<?= base_url('Kategori/hapus/' . $kk['id']) ?>" onclick="return confirm('Anda Yakin ingin Menghapus Data Ini???');" class="btn btn-danger btn-sm"> Hapus</a>
              </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach ?>
        </table>
      </div>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 

<!-- Modal tambah Kab/Kota -->

<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModal">Tambah Kab/Kota </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div>
        <form action="<?= base_url('kategori'); ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control" id="namakabKota" name="namakabKota" placeholder="Nama Kab/Kota...">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success ">Tambah</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal tambah Menu -->


<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
  $(document).ready(function() {
    // Untuk sunting
   
    $("#hapus-data").click(function() {
      $("#delete_item_id").val($('p').get());
      $('#hapus-data').modal('show');
    });
  });
</script>