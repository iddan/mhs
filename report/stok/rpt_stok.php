<?php
session_start();
	include '../../config/connect.php';
	include '../../config/function.php';
	include '../../config/config.php';
$report = anti($_GET['rpt']);
$start = anti($_GET['start']);
$end = anti($_GET['end']);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../css/report.css">
<title>Laporan <?php echo $report;?></title>
</head>
<body>
<div style="float:left; padding: 5px 0 5px 5; position:fixed; background-color:#F2F2F2; width:98.5%">
<a href="../../modul=laporan"><button type="button">Back</button></a> <a href=""><button type="button" name="save">Save As</button></a>
</div>
<div id="lap">
<?php include '../header.php';?>
<table width="100%" border="1" bgcolor="#000000">
  <tr align="center" bgcolor="#CCCCCC">
    <th>No</th>
    <th>Kode</th>
    <th>Produk</th>
    <th>Stok</th>
    <th>Harga Beli</th>
    <th>Harga Jual</th>
  </tr>
  <?php
  $no = 1;
	$q = yposSQL('SHOW','ypos_barang','kdbarang, nama_barang, harga_beli, harga_jual, stok',"ids=$_SESSION[yids] && 1=1");
	$tot = yposSQL('SHOW','ypos_barang','sum(stok) as stok',"ids=$_SESSION[yids] && 1=1")->fetch_array();
  while($r=$q->fetch_array()) {?>
  <tr align="center" bgcolor="#F1F1F1">
    <td><?php echo $no;?></td>
    <td><?php echo $r['kdbarang'];?></td>
    <td><?php echo $r['nama_barang'];?></td>
    <td><?php echo $r['stok'];?></td>
    <td><?php echo idr($r['harga_beli']);?></td>
    <td><?php echo idr($r['harga_jual']);?></td>
  </tr>
  <?php $no++;
  }?>
  <tr align="center" bgcolor="#CCCCCC">
  <th colspan="2">Total</th>
  <th>&nbsp;</th>
  <th><?php echo idr($tot['stok']);?></th>
  <th></th>
  <th></th>
  </tr>
</table>
</div>
<br/><br/>
<hr size="4" color="#000000" />
</body>
</html>