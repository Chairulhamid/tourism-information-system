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



  <!-- DataTales -->
  <div class="card shadow mb-20">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary ">Data About</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover display nowrap dataTable dtr-inline table table-bordered table-striped text-center" id="dataTable" >
        <thead>
            <tr>
              <th colspan="1">No</th>
              <th colspan="1">Judul</th>
              <th colspan="1">Deskripsi</th>
              <th colspan="1">Foto</th>
              <th colspan="1">Aksi</th>
              

            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($about as $b) : ?>
              <tr>
                <td scope=" row"><?= $i; ?></td>
                <td><?=$b['judul']; ?></td>
                <td><?=$b['deskripsi']; ?></td>
                <td >
                    <img src="<?= base_url('assets/img/profile/') .$b['gambar']; ?>"  width="100" height="100">
                </td>
                <td>
               <a class="btn btn-info btn-sm" href="" data-id="<?php echo $b['id'] ?>" data-judul="<?php echo $b['judul'] ?>" data-deskripsi="<?php echo $b['deskripsi'] ?>" data-gambar="<?php echo $b['gambar'] ?>" data-toggle="modal" data-target="#edit-data"></i>Edit</a>
               <a href=" <?= base_url('media/detail_about/') .$b['id']; ?>" class="btn btn-warning btn-sm">Detail</a>
                
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



<!-- Modal Ubah   -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel" style="font-weight: bold;">Edit Data About</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="font-weight: bold;">x</button>
      </div>
      <form class="form-horizontal" action="<?php echo base_url('Media/ubah_about') ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
             <div class="form-group ">
            <label class="control-label col-xs-3" style="font-weight: bold;">Judul</label>
              <input type="hidden" id="id" name="id">
              <textarea name="judul" id="judul" class="form-control" type="text"></textarea>
            
            </div>
             <div class="form-group ">
            <label class="control-label col-xs-3" style="font-weight: bold;">Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" class="form-control" type="text"></textarea>
            
            </div>
            <div class="form-group ">
              <label class="control-label col-xs-3" style="font-weight: bold;">Gambar</label>
               <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" type="submit"> Simpan&nbsp;</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END Modal Ubah  -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
  $(document).ready(function() {
    // Untuk sunting
    $('#edit-data').on('show.bs.modal', function(event) {
      let div = $(event.relatedTarget); // Tombol dimana modal di tampilkan
      let modal = $(this);

      // Isi nilai pada field
      modal.find('#id').attr("value", div.data('id'));
      modal.find('textarea#judul').val( div.data('judul'));
      modal.find('textarea#deskripsi').val( div.data('deskripsi'));
   
      modal.find('#gambar').attr("value", div.data('gambar','assets/img/profile/'));
      
      
    });
    $("#hapus-data").click(function() {
      //Say - $('p').get(0).id - this delete item id
      //modal.find('#delete_item_id').attr("value",div.data('#delete_item_id'));
      $("#delete_item_id").val($('p').get());
      $('#hapus-data').modal('show');
    });
  });
</script>
