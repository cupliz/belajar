<?php 
require 'db.php';
$data = array();

$result = $dbcon->query('SELECT * FROM unit_kerja');
while($row = $result->fetch_assoc()){
  $data[] = $row;
}
?>

<table>
  <tr>
    <th>id</th>
    <th>nama</th>
    <th>dinas</th>
  </tr>
  <?php
    foreach ($data as $key => $value) {
      echo '
        <tr>
          <td>'.$value['id'].'</td>
          <td>'.$value['nama'].'</td>
          <td>'.$value['dinas'].'</td>
        </tr>
      ';
    }
  ?>
</table>