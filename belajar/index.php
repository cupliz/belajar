<?php 

$nama="sofyan";
$umur=16.92;
$alamat="jogja";
$array = ['joko',17,'banjar'];
// function()
// object{}
// array[]
// tag/component<>

echo $nama.' '.$umur.' '.$alamat;
echo '<br/>';
print_r($array);
echo '<hr/>';
var_dump($array);
echo '<br/>';
echo $array[0];
echo '
<ul>
  <li>'.$array[0].'</li>
  <li>'.$array[1].'</li>
  <li>'.$array[2].'</li>
</ul>
';


?>