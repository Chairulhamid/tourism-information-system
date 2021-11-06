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

  <a href="<?= base_url('event/tambah_event') ?>" class="btn btn-primary mb-3" ><i class="fa fa-plus"></i> Tambah</a>
    <a href="<?= base_url('Cetak/cetak_event') ?>" class="btn btn-success mb-3" target="blank" target="_blank" ><i class="fas fa-print"></i> Print</a>

  <!-- DataTales -->
  <div class="card shadow mb-20">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary ">Data Event Wisata</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover display nowrap dataTable dtr-inline table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0" style="text-align:center">
        <thead>
            <tr>
              <th colspan="1">No</th>
              <th colspan="1">Nama Event</th>
              <th colspan="1">Daerah</th>
              <th colspan="1">Lokasi Event</th>
              <th colspan="1">Tanggal Event</th>
  
              <th colspan="1">Foto</th>
              <th colspan="1">Aksi</th>
              

            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($event as $alm) : ?>
              <tr>
                <td scope=" row"><?= $i; ?></td>
                <td><?= $alm['nama_event']; ?></td>
                <td><?= $alm['daerah']; ?></td>
                <td><?= $alm['lokasi']; ?></td>
                <td><?= $alm['tanggal']; ?></td>
               
                <td>
                    <img src="<?= base_url('assets/img/profile/') . $alm['gambar']; ?>"  width="100" height="100">
                </td>
                <td>
               <a class="btn btn-info btn-sm" href="" data-id="<?php echo $alm['id'] ?>" data-nama_event="<?php echo $alm['nama_event'] ?>" data-daerah="<?php echo $alm['daerah'] ?>" data-lokasi="<?php echo $alm['lokasi'] ?>"data-tanggal="<?php echo $alm['tanggal'] ?>" data-deskripsi="<?php echo $alm['deskripsi'] ?>" data-gambar="<?php echo $alm['gambar'] ?>" data-toggle="modal" data-target="#edit-data">Edit</a>
               <a href=" <?= base_url('event/detail_event/') . $alm['id']; ?>" class="btn btn-warning btn-sm">Detail</a>
                  <a href="<?= base_url('event/hapus_event/' . $alm['id']) ?>" onclick="return confirm('Anda Yakin ingin Menghapus Data Ini???');" class="btn btn-danger btn-sm"> Hapus</a>
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
        <h3 class="modal-title" id="myModalLabel" style="font-weight: bold;">Edit Data Event</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="font-weight: bold;">x</button>
      </div>
      <form class="form-horizontal" action="<?php echo base_url('Event/ubah') ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          
            <div class="form-group ">
              <label class="control-label col-xs-3" style="font-weight: bold;">Nama Event</label>
              <input type="hidden" id="id" name="id">
              <input name="nama_event" id="nama_event" class="form-control" type="text">
            </div>
           <div class="form-group">
                     <label style="font-weight: bold;">Nama Daerah</label>
                        <select name="daerah" id="daerah" class="form-control">
                            <option value="">Pilih Daerah</option>
                            <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k['namakabKota']; ?>"><?= $k['namakabKota']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
            <div class="form-group ">
              <label class="control-label col-xs-3" style="font-weight: bold;">Lokasi Event</label>
              <input name="lokasi" id="lokasi" class="form-control" type="text">
            </div>
            <div class="form-group ">
              <label class="control-label col-xs-3" style="font-weight: bold;">Tanggal Event</label>
              <input name="tanggal" id="tanggal" class="form-control" type="date">
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
      modal.find('#nama_event').attr("value", div.data('nama_event'));
      modal.find('#daerah').attr("value", div.data('daerah'));
      modal.find('#lokasi').attr("value", div.data('lokasi'));
      modal.find('#tanggal').attr("value", div.data('tanggal'));
      modal.find('textarea#deskripsi').val( div.data('deskripsi'));
      modal.find('#tanggal').attr("value", div.data('tanggal','assets/img/profile/'));
    });
    $("#hapus-data").click(function() {
      //Say - $('p').get(0).id - this delete item id
      //modal.find('#delete_item_id').attr("value",div.data('#delete_item_id'));
      $("#delete_item_id").val($('p').get());
      $('#hapus-data').modal('show');
    });
  });
</script>
