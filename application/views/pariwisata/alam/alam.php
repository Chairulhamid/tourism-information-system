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

  <a href="<?= base_url('pariwisata/tambah_alam') ?>" class="btn btn-primary mb-3" ><i class="fa fa-plus"></i> Tambah</a>
  <a href="<?= base_url('Cetak/cetak_alam') ?>" class="btn btn-success mb-3" target="blank" target="_blank" ><i class="fas fa-print"></i> Print</a>

  <!-- DataTales -->
  <div class="card shadow mb-20">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary ">Data Wisata Alam</h6>
    </div>
    <div class="card-body">
     <div class="table-responsive">
     <table class="table table-hover display nowrap dataTable dtr-inline table table-bordered table-striped text-center" id="dataTable">
        <thead>
            <tr>
              <th colspan="1">No</th>
              <th colspan="">Nama Objek</th>
              <th colspan="">Nama Daerah</th>
              <th colspan="">Lokasi Wisata</th>
              <th colspan="1">Jarak Tempuh dai Kab/Kota(KM)</th>
              
              <th colspan="1">Foto</th>
              <th colspan="1">Aksi</th>
              

            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($alam as $alm) : ?>
              <tr>
                <td scope=" row"><?= $i; ?></td>
                <td><?= $alm['objek_wisata']; ?></td>
                <td><?= $alm['daerah']; ?></td>
                <td><?= $alm['lokasi']; ?></td>
                <td><?= $alm['jarak_tempuh']; ?></td> 
                
                <td >
                    <img src="<?= base_url('assets/img/profile/') . $alm['foto']; ?>"  width="100" height="100">
                </td> 
                <td>
               <a class="btn btn-info btn-sm" href="" data-id="<?php echo $alm['id'] ?>" data-objek_wisata="<?php echo $alm['objek_wisata'] ?>" data-daerah="<?php echo $alm['daerah'] ?>" data-lokasi="<?php echo $alm['lokasi'] ?>"data-jarak_tempuh="<?php echo $alm['jarak_tempuh'] ?>" data-deskripsi="<?php echo $alm['deskripsi'] ?>" data-foto="<?php echo $alm['foto'] ?>" data-toggle="modal" data-target="#edit-data">Edit</a>
               <a href=" <?= base_url('pariwisata/detail_alam/') . $alm['id']; ?>" class="btn btn-warning btn-sm">Detail</a>
                  <a href="<?= base_url('pariwisata/hapus_alam/' . $alm['id']) ?>" onclick="return confirm('Anda Yakin ingin Menghapus Data Ini???');" class="btn btn-danger btn-sm"> Hapus</a>
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
        <h3 class="modal-title" id="myModalLabel" style="font-weight: bold;">Edit Data Wisata Alam</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="font-weight: bold;">x</button>
      </div>
      <form class="form-horizontal" action="<?php echo base_url('Pariwisata/ubah') ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          
            <div class="form-group ">
              <label class="control-label col-xs-3" style="font-weight: bold;">Nama Objek Wisata</label>
              <input type="hidden" id="id" name="id">
              <input name="objek_wisata" id="objek_wisata" class="form-control" type="text">
            </div>
            <div class="form-group">
                     <label style="font-weight: bold;">Daerah Objek Wisata</label>
                        <select name="daerah" id="daerah" class="form-control">
                            <option value="" >Pilih Daerah</option>
                            <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k['namakabKota']; ?>"><?= $k['namakabKota']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
            <div class="form-group ">
              <label class="control-label col-xs-3" style="font-weight: bold;">Lokasi Daerah Wisata</label>
              <input name="lokasi" id="lokasi" class="form-control" type="text">
            </div>
            <div class="form-group ">
              <label class="control-label col-xs-3" style="font-weight: bold;">Jarak Tempuh Dari Kab/Kota (KM)</label>
              <input name="jarak_tempuh" id="jarak_tempuh" class="form-control" type="text">
            </div>
            <div class="form-group ">
              <label class="control-label col-xs-3" style="font-weight: bold;">Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" class="form-control" type="text" ></textarea>
            
            </div>
            <div class="form-group ">
              <label class="control-label col-xs-3" style="font-weight: bold;">Gambar</label>
               <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
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
      modal.find('#objek_wisata').attr("value", div.data('objek_wisata'));
      modal.find('#daerah').attr("value", div.data('daerah'));
      modal.find('#lokasi').attr("value", div.data('lokasi'));
      modal.find('#jarak_tempuh').attr("value", div.data('jarak_tempuh'));
      modal.find('textarea#deskripsi').val( div.data('deskripsi'));
      modal.find('#foto').attr("value", div.data('foto','assets/img/profile/'));
      
      
    });
    $("#hapus-data").click(function() {
      //Say - $('p').get(0).id - this delete item id
      //modal.find('#delete_item_id').attr("value",div.data('#delete_item_id'));
      $("#delete_item_id").val($('p').get());
      $('#hapus-data').modal('show');
    });
  });
  
</script>
<script>$(document).ready(function() {
var table = $('#tabel-data').DataTable( {
scrollY: "300px",
scrollX: true,
scrollCollapse: true
 
} );
} );

 </script>
 <script></script>


