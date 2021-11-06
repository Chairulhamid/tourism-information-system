<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?= form_error('akun', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

         <a href="<?= base_url('admin/addAkun'); ?>" class="btn btn-primary mb-3">Tambah </a>

                       <table class="table table-hover display nowrap dataTable dtr-inline table table-bordered table-striped text-center" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($akun as $m) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $m['name']; ?></td>
                        <td><?= $m['email']; ?></td>
                        <td>
                            <img src="<?= base_url('assets/img/profile/') . $m['image']; ?>"  width="100" height="100">
                        </td>
                        <td>
                          <a class="btn btn-info btn-sm" href="" data-id="<?php echo $m['id'] ?>" data-name="<?php echo $m['name'] ?>" data-email="<?php echo $m['email'] ?>" data-image="<?php echo $m['image'] ?>"data-password="<?php echo $m['password'] ?>" data-role_id="<?php echo $m['role_id'] ?>" data-is_active="<?php echo $m['is_active'] ?>"data-date_created="<?php echo $m['date_created'] ?>" data-toggle="modal" data-target="#edit-data">Edit</a>
                            <a href="<?= base_url('admin/hapusAkun/' . $m['id']) ?>" onclick="return confirm('Anda Yakin ingin Menghapus Data Ini???');" class="btn btn-danger btn-sm"> Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('auth/registration'); ?>" method="post">
                <div class="modal-body">
                   <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama" value="<?= set_value('name'); ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                                </div>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div> 

<!-- Modal Ubah   -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel" style="font-weight: bold;">Edit Data Akun</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="font-weight: bold;">x</button>
      </div>
      <form class="form-horizontal" action="<?php echo base_url('Admin/ubahAkun') ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          
            <div class="form-group ">
              <label class="control-label col-xs-3" style="font-weight: bold;">Nama</label>
              <input type="hidden" id="id" name="id">
              <input name="name" id="name" class="form-control" type="text">
            </div>
         
            <div class="form-group ">
              <label class="control-label col-xs-3" style="font-weight: bold;">Email</label>
              <input name="email" id="email" class="form-control" type="text">
            </div>
            
            <div class="form-group ">
              <label class="control-label col-xs-3" style="font-weight: bold;">Gambar</label>
               <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
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
      modal.find('#name').attr("value", div.data('name'));
      modal.find('#email').attr("value", div.data('email'));
      modal.find('#image').attr("value", div.data('image','assets/img/profile/'));
      
      
    });
    $("#hapus-data").click(function() {
      //Say - $('p').get(0).id - this delete item id
      //modal.find('#delete_item_id').attr("value",div.data('#delete_item_id'));
      $("#delete_item_id").val($('p').get());
      $('#hapus-data').modal('show');
    });
  });
</script>
