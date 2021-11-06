
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	
</head>
<body>
<div align="center"><strong>DINAS PARIWISATA SUMATERA BARAT </strong><br/>
<div align="center"><strong>LAPORAN DATA WISATA ALAM </strong><br/>
<div align="center"><strong>Alamat: Jl Khatib Sulaiman No.7 Kota Padang, Sumatera Barat.</strong><br/>
<div align="center"><strong>Telepon : 0751 - 705583, 446281</strong><br/>
<div align="center"><strong>____________________________________________________________</strong><br/>

</div><html><br>

<table  style="width:1000px;position:relative;" class="display nowrap dataTable dtr-inline table table-bordered table-striped text-center" cellspacing="0">
 <tr >	<th style="text-align:center;" scope="col">NO</th>
								      	<th style="text-align:center;" scope="col">Nama Objek</th>
								    	<th style="text-align:center;" scope="col">Nama Daerah</th>
								    	<th style="text-align:center;" scope="col">Lokasi Wisata</th>
								    	<th style="text-align:center;" scope="col">Jarak Tempuh dai Kab/Kota(KM)</th>
								    	<th style="text-align:center;" scope="col">Foto</th>
								    	
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
               
              </tr>
              <?php $i++; ?>
            <?php endforeach ?>
<div id="kanan">
</div>

</table>
<br>
<br>
<div align="center"><strong><b> Padang, <?php echo date('d M Y')?></strong><br/>
<div align="center"><strong><b> Dinas Pariwisata</strong><br/>
<br></br>
<br>
<div align="center"><strong>( Kepala Dinas Pariwisata ) </strong><br/>
<div align="center"><strong><b> NIP.   </strong><br/>
</div>

</div>
</div></div>

<script type="text/javascript">
    window.print();
</script>

</body>
</html>

