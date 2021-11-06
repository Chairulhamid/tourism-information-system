<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="col-xl-12">
    <div class="form-wecom">
      <div class="">
        <?php

        echo form_open(base_url('Admin/verifikasiAkun'), ['class' => 'form-wecom']);

        ?>
        <div class="form-group row">
          <label for="nama" class="col-3"> Nama</label>
          <div class="col-9">
            <?php

            $data = [
              'name' => 'nama',
              'id' => 'nama',
              'class' => 'form-control',
              'value' => set_value('nama'),
              'placeholder' => 'Nama'
            ];
            echo form_input($data);
            echo form_error('nama');

            ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-3"> Email</label>
          <div class="col-9">
            <?php

            $data = [
              'name' => 'email',
              'id' => 'email',
              'class' => 'form-control',
              'value' => set_value('email'),
              'placeholder' => 'Email'
            ];
            echo form_input($data);
            echo form_error('email');

            ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-3"> Password</label>
          <div class="col-9">
            <?php

            $data = [
              'name' => 'password',
              'id' => 'password',
              'class' => 'form-control',
              'placeholder' => 'Password'
            ];
            echo form_password($data);
            echo form_error('password');

            ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="konfirmasi_password" class="col-3"> Ulangi Password</label>
          <div class="col-9">
            <?php

            $data = [
              'name' => 'konfirmasi_password',
              'id' => 'konfirmasi_password',
              'class' => 'form-control',
              'placeholder' => 'Ulangi Password'
            ];
            echo form_password($data);
            echo form_error('konfirmasi_password');

            ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="role" class="col-3"> Role Akses</label>
          <div class="col-9">
            <?php

            $data = [
              'name'  => 'role',
              'id'    => 'role',
              'class' => 'form-control',
            ];
            $option = [
              '1' => 'Administrator',
              '2' => 'Admin Website',
             
            ];
            echo form_dropdown($data, $option);
            echo form_error('role');

            ?>
          </div>
        </div>

        <?php
        echo form_submit(['name' => 'submit', 'class' => 'btn btn-success btn-block'], 'Tambah');
        echo form_close();
        ?>
        <a href="<?= base_url('Admin/role') ?>" class="btn btn-secondary btn-block"> Kembali</a>
        

      </div>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->