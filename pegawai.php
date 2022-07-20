<?php 
require 'header.php';
require 'db.php';
session_start();  // inisiasi session
// session_destroy(); // mengosongkan session

// if(!isset($_SESSION['pegawai'])){ //jika session pegawai tidak isi
//   $_SESSION['pegawai'] = array(); // membuat array
// }

// menambah data pegawai
if(count($_POST)){
  $tambah_sql = sprintf('INSERT INTO pegawai (nip,nama,pangkat,unit_kerja) VALUES ("%s","%s","%s",%u)
  ON DUPLICATE KEY UPDATE nama="%s",pangkat="%s",unit_kerja="%u" ',
  $_POST['nip'],$_POST['nama'],$_POST['pangkat'],$_POST['unit_kerja'],$_POST['nama'],$_POST['pangkat'],$_POST['unit_kerja']);
  $dbcon->query($tambah_sql);
  echo $tambah_sql;
}

// menghapus data pegawai
if(isset($_GET['hapus'])){
  $id_yg_akan_dihapus = $_GET['hapus'];
  $query_hapus = 'DELETE FROM pegawai WHERE nip="'.$id_yg_akan_dihapus.'" ';
  $dbcon->query($query_hapus);
}


// edit data pegawai
$detail = array();
if(isset($_GET['edit'])){
  $id_edit = $_GET['edit'];
  $rs3 = $dbcon->query('SELECT * FROM pegawai WHERE nip='.$id_edit);
  $detail = $rs3->fetch_assoc();
  print_r($detail);
}



// mengambil data pegawai
$pegawai = array();
$rs1 = $dbcon->query('SELECT p.*,u.nama AS nama_u FROM pegawai p LEFT JOIN unit_kerja u ON p.unit_kerja=u.id');
while($row = $rs1->fetch_assoc()){
  $pegawai[] = $row;
}

// mengambil data unitkerja
$unit_kerja = array();
$rs2 = $dbcon->query('SELECT * FROM unit_kerja');
while($row = $rs2->fetch_assoc()){
  $unit_kerja[] = $row;
}

function tampil($array,$key){
  echo isset($array[$key]) ? $array[$key] : '';
}
function pilih($array,$key,$syarat){
  return isset($array[$key]) && $array[$key]==$syarat ? 'selected' : '';
}

$dbcon->close();
?>

<table class="table table-hover">
  <tr>
    <th>Nama</th>
    <th>NIP</th>
    <th>Pangkat</th>
    <th>Unit Kerja</th>
    <th>Action</th>
  </tr>
  <?php
    foreach ($pegawai as $val) {
      echo '
      <tr>
        <td>'.$val['nama'].'</td>
        <td>'.$val['nip'].'</td>
        <td>'.$val['pangkat'].'</td>
        <td>'.$val['nama_u'].'</td>
        <td><a href="?hapus='.$val['nip'].'"> Hapus </a></td>
        <td><a href="?edit='.$val['nip'].'"> Edit </a></td>
      </tr>
      ';
    }
  ?>
</table>

<br>
<br>
<br>

<form action="" method="POST">
  <label for="nip">NIP: </label><input name="nip" type="text" value="<?php tampil($detail,'nip')?>"><br>
  <label for="nama">Nama: </label><input name="nama" type="text" value="<?php tampil($detail,'nama') ?>"><br>

  <label for="pangkat">Pangkat: </label><br>
  <select name="pangkat">
    <option value="penata" <?php echo pilih($detail,'pangkat','penata') ?>>Penata</option>
    <option value="pembina" <?php echo pilih($detail,'pangkat','pembina') ?>>Pembina</option>
    <option value="pengatur" <?php echo pilih($detail,'pangkat','pengatur') ?>> Pengatur</option>
  </select><br>

  <label for="unit_kerja">Unit Kerja: </label><br>
  <select name="unit_kerja">
    <?php
    foreach ($unit_kerja as $val) {
      echo '<option value="'.$val['id'].'" '.pilih($detail,'unit_kerja',$val['id']).'>'.$val['nama'].'</option>';
     } 
    ?>
  </select><br>

  <button class="btn btn-primary" type="submit">Simpan</button>
</form>