<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


 <div class="row justify-content-around">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-s font-weight-bold text-primary text-uppercase mb-1">Jumlah Wisata Alam</div>
                    <div class="h mb-0 font-weight-bold text-gray-800">
                                <?= $total_alam ?>	
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-desktop fa-3x text-gray-300"></i>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-s font-weight-bold text-info text-uppercase mb-1">Jumlah Wisata Bahari</div>
                    <div class="h mb-0 font-weight-bold text-gray-800">
                               <?= $total_bahari ?>	
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-desktop fa-3x text-gray-300"></i>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-s font-weight-bold text-warning text-uppercase mb-1">Jumlah Wisata Budaya</div>
                    <div class="h mb-0 font-weight-bold text-gray-800">
                               <?= $total_budaya ?>	
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-desktop fa-3x text-gray-300"></i>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-s font-weight-bold text-danger text-uppercase mb-1">Jumlah Hotel & Penginapan</div>
                    <div class="h mb-0 font-weight-bold text-gray-800">
                                <?= $total_hotel ?>	
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-desktop fa-3x text-gray-300"></i>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-s font-weight-bold text-info text-uppercase mb-1">Jumlah Wisata Kuliner</div>
                    <div class="h mb-0 font-weight-bold text-gray-800">
                            <?= $total_kuliner ?>	
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-desktop fa-3x text-gray-300"></i>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-s font-weight-bold text-info text-uppercase mb-1">Jumlah Wisata Edukasi</div>
                    <div class="h mb-0 font-weight-bold text-gray-800">
                            <?= $total_edukasi ?>	
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-desktop fa-3x text-gray-300"></i>
                </div>
                </div>
            </div>
        </div>
    </div>
 </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 