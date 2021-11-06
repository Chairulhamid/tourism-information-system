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

  <a href="<?= base_url('pariwisata/tambah_hotel') ?>" class="btn btn-primary mb-3" ><i class="fa fa-plus"></i> Tambah</a>
      <a href="<?= base_url('Cetak/cetak_hotel') ?>" class="btn btn-success mb-3" target="blank" target="_blank" ><i class="fas fa-print"></i> Print</a>

  <!-- DataTales -->
  <div class="card shadow mb-20">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary ">Data Penginapan dan Hotel</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover display nowrap dataTable dtr-inline table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0" style="text-align:center">
        
         <thead>
            <tr>
              <th colspan="1">No</th>
              <th colspan="1">Nama Hotel</th>
              <th colspan="1">Nama Daerah</th>
              <th colspan="1">Lokasi Wisata</th>
              <th colspan="1">No Handphone</th>
              <th colspan="1">Tarif Harga</th>
              <th colspan="1">Foto</th>
 
             
              <th colspan="1">Aksi</th>
              

            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($hotel as $ht) : ?>
              <tr>
                <td scope=" row"><?= $i; ?></td>
                <td><?= $ht['nama_hotel']; ?></td>
                <td><?= $ht['daerah']; ?></td>
                <td><?= $ht['lokasi']; ?></td>
                <td><?= $ht['nohp']; ?></td>
                 <td>Rp.<?= number_format($ht['tarif'], 2, ",", "."); ?></td>
                <td>
                    <img src="<?= base_url('assets/img/profile/') . $ht['gambar']; ?>"  width="100" height="100">
                </td>
               
              
                <td>
                <a class="btn btn-info btn-sm" href="" data-id="<?php echo $ht['id'] ?>" data-nama_hotel="<?php echo $ht['nama_hotel'] ?>" data-daerah="<?php echo $ht['daerah'] ?>" data-lokasi="<?php echo $ht['lokasi'] ?>"data-tarif="<?php echo $ht['tarif'] ?>" data-nohp="<?php echo $ht['nohp'] ?>" data-deskripsi="<?php echo $ht['deskripsi'] ?>" data-gambar="<?php echo $ht['gambar'] ?>" data-toggle="modal" data-target="#edit-data"></i>Edit</a>
               <a href=" <?= base_url('pariwisata/detail_hotel/') . $ht['id']; ?>" class="btn btn-warning btn-sm">Detail</a>
               <a href="<?= base_url('pariwisata/hapus_hotel/' . $ht['id']) ?>" onclick="return confirm('Anda Yakin ingin Menghapus Data Ini???');" class="btn btn-danger btn-sm"> Hapus</a>
                 
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
        <h3 class="modal-title" id="myModalLabel" style="font-weight: bold;">Edit Data Hotel & Penginapan</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="font-weight: bold;">x</button>
      </div>
      <form class="form-horizontal" action="<?php echo base_url('Pariwisata/ubah_hotel') ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          
            <div class="form-group ">
              <label class="control-label col-xs-3" style="font-weight: bold;">Nama Penginapan</label>
              <input type="hidden" id="id" name="id">
              <input name="nama_hotel" id="nama_hotel" class="form-control" type="text">
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
              <label class="control-label col-xs-3" style="font-weight: bold;">Lokasi Penginapan</label>
              <input name="lokasi" id="lokasi" class="form-control" type="text">
            </div>
            <div class="form-group ">
              <label class="control-label col-xs-3" style="font-weight: bold;">Tarif Harga</label>
              <input name="tarif" id="tarif" class="form-control" type="text">
            </div>
            <div class="form-group ">
              <label class="control-label col-xs-3" style="font-weight: bold;">No Telephon</label>
              <input name="nohp" id="nohp" class="form-control" type="text">
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
      modal.find('#nama_hotel').attr("value", div.data('nama_hotel'));
      modal.find('#daerah').attr("value", div.data('daerah'));
      modal.find('#lokasi').attr("value", div.data('lokasi'));
      modal.find('#tarif').attr("value", div.data('tarif'));
      modal.find('#nohp').attr("value", div.data('nohp'));
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
