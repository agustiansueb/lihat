<?php require_once'con.php';?>
<!DOCTYPE html>
<html>
<head>
 <title>Masukan keluarkan</title>
 <meta content="width=device-width, initial-scale=1" name="viewport"/>
 <style>
 body{background:black;color:#fff;font-size:16px;font-family:Roboto;}
 .resize{max-width:1000px;width:100%;margin:0;padding:20px 25px;}
 .resize form{height:auto;width:100%;position:relative;background:yellow;text-align:left;}
 .resize input[type=submit]{width:20%;border:none;padding:4px 0 4px 0;color:#fff;}
 .resize input{height:30px;background:#fff;padding:20px 25px;color:#000000;}
 table{width:100%;}
 table td{border:1px solid green;padding:4px 7px;}
 input{margin-bottom:8px;clear:both;}
@media(max-width:468px){
 .resize{width:83%;}
 .resize form{padding:5% 0 0 6%;}
 .resize input[type=submit]{left:6.5%;top:60%;background:black;}
 }
 </style>
</head>
<body>
<div class="resize">
<?php 
if(isset($_POST['submit'])){
$postTitle = $_POST['postTitle'];
$suka = $_POST['suka'];
$tidak = $_POST['tidak'];
$stmt =$db->prepare('INSERT INTO sukadantidak (postTitle,suka,tidak) VALUES (:postTitle,:suka,:tidak)');
$stmt->execute(array(
':postTitle' => $postTitle,
':suka' => $suka,
':tidak' => $tidak
));
}
?>
 <form method="POST">
 <p><input type="text" name="postTitle" placeholder="Nama kamu siapa"></p>
  <p><input type="text" name="suka" placeholder="Suka apa"></p>
 <p><input type="text" name="tidak" placeholder="tidak suka apa"></p>
 <p><input type="submit" name="submit" value="submit"></p>
 </form>
 <?php
 $stmt =$db->query("SELECT * FROM sukadantidak ORDER BY id DESC");
 while($row = $stmt->fetch()){
 echo'<table>';
 echo'<tr><td>Nomor</td><td>Nama</td><td>Suka</td><td>Tidak suka</td></tr>';
 echo'<tr>';
 echo'<td>'.$row['id'].'</td>';
 echo'<td>'.$row['postTitle'].'</td>';
 echo'<td>'.$row['suka'].'</td>';
 echo'<td>'.$row['tidak'].'</td>';
 echo'</tr>';
 echo'</table>';
 }
 ?>
 </div>
</body>
</html>
