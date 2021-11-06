<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



  <div class="col-12 col-md-12">
    <div class="card">
      <div class="card-body">
        <form action="" method="post" accept-charset="utf-8">
          <div class="form-group row">
            <label for="nama_depan" class="col-3 control-label "style="font-weight: bold;">Nama Kab/Kota</label>
            <div class="col-9">
              <input type="text" name="namakabKota" value="<?= $kategori['namakabKota']; ?>" id="namakabKota" class="form-control" >
            </div>
          </div>
          <input type="submit" name="simpan" value="Simpan" class="btn btn-success btn-block">
          <a href="<?= base_url('kategori') ?>" class="btn btn-secondary btn-block"></i> Kembali</a>
        </form>
      </div>
    </div>
  </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
  let X = document.querySelector('#roleid');
  console.log(X.value);
</script>