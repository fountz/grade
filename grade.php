<h3>ระบบคำนวณเกรด</h3>
<table>
  <form method="post" action=#>
    <tr>
    <td>วิชาที่ 1 ชื่อ : </td><td><input type="text" name="name1" required></td><td>หน่วยกิต : </td><td><input type="text" name="n1" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" required></td></tr>
    <tr>
    <td>Mid(35) : </td><td><input type="text" name="mid1" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" required></td><td>Final(35) : </td><td><input type="text" name="fin1" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" required></td><td>HW(30) : </td><td><input type="text" name="HW1" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" required> </td></tr>
    <tr>
    <td>วิชาที่ 2 ชื่อ : </td><td><input type="text" name="name2" required></td><td> หน่วยกิต : </td><td><input type="text" name="n2" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" required></td></tr>
    <tr>
    <td>Mid(35) : </td><td><input type="text" name="mid2" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" required></td><td> Final(35) :</td><td><input type="text" name="fin2" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" required></td><td> HW(30) : </td><td><input type="text" name="HW2" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" required> </td></tr>
    <tr>
    <td>วิชาที่ 3 ชื่อ : </td><td><input type="text" name="name3" required></td><td>หน่วยกิต : </td><td><input type="text" name="n3" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" required></td></tr>
    <tr>
    <td>Mid(35) : </td><td><input type="text" name="mid3" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" required></td><td>Final(35) : </td><td><input type="text" name="fin3" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" required></td><td>HW(30) : </td><td><input type="text" name="HW3" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" required> </td></tr>
</table>
    <input type="submit" name="submit" value="ตกลง" >
  </form>
<?php
if(isset($_POST['submit'])){
  $sum1=$_POST['mid1']+$_POST['fin1']+$_POST['HW1'];
  $sum2=$_POST['mid2']+$_POST['fin2']+$_POST['HW2'];
  $sum3=$_POST['mid3']+$_POST['fin3']+$_POST['HW3'];

  ?>
  <table border=1>
    <tr><th>วิชา</th><th>หน่วย</th><th>Mid</th><th>Final</th><th>HW</th><th>รวม</th><th> เกรด</th></tr>
    <tr><td><?php echo $_POST['name1'];?></td><td><?php echo $_POST['n1'];?></td><td><?php echo $_POST['mid1'];?></td><td><?php echo $_POST['fin1'];?></td><td><?php echo $_POST['HW1'];?></td>
      <td><?php echo $sum1;?></td><td align=center><?php echo getgrade($sum1);?></td>
    </tr>
    <tr><td><?php echo $_POST['name2'];?></td><td><?php echo $_POST['n2'];?></td><td><?php echo $_POST['mid2'];?></td><td><?php echo $_POST['fin2'];?></td><td><?php echo $_POST['HW2'];?></td>
      <td><?php echo $sum2;?></td><td align=center><?php echo getgrade($sum2);?></td>
    </tr>
    <tr><td><?php echo $_POST['name3'];?></td><td><?php echo $_POST['n3'];?></td><td><?php echo $_POST['mid3'];?></td><td><?php echo $_POST['fin3'];?></td><td><?php echo $_POST['HW3'];?></td>
      <td><?php echo $sum3;?></td><td align=center><?php echo getgrade($sum3);?></td>
    </tr>
    <tr><td colspan=5 align=right>เกรดเฉลี่ย</td><td colspan=2 align=center><?php echo average(getgrade($sum1),getgrade($sum2),getgrade($sum3),$_POST['n1'],$_POST['n2'],$_POST['n3']) ; ?> </td></tr>
  </table>
  <?php
}
function getgrade($sum){
  if($sum>100) return "ERROR";
  else if($sum>=80) return "A";
  else if($sum>=75) return "B+";
  else if($sum>=70) return "B";
  else if($sum>=65) return "C+";
  else if($sum>=60) return "C";
  else if($sum>=55) return "D+";
  else if($sum>=50) return "D";
  else if($sum>=0) return "F";
  else return "ERROR";
}
function average($s1,$s2,$s3,$g1,$g2,$g3){
$unit=$g1+$g2+$g3;
if($s1=="A") $as1=$g1*4;
else if($s1=="B+") $as1=$g1*3.5;
else if($s1=="B") $as1=$g1*3;
else if($s1=="C+") $as1=$g1*2.5;
else if($s1=="C") $as1=$g1*2;
else if($s1=="D+") $as1=$g1*1.5;
else if($s1=="D") $as1=$g1*1;
else if($s1=="F") $as1=$g1*0;
else return"ERROR";

if($s2=="A") $as2=$g2*4;
else if($s2=="B+") $as2=$g2*3.5;
else if($s2=="B") $as2=$g2*3;
else if($s2=="C+") $as2=$g2*2.5;
else if($s2=="C") $as2=$g2*2;
else if($s2=="D+") $as2=$g2*1.5;
else if($s2=="D") $as2=$g2*1;
else if($s2=="F") $as2=$g2*0;
else return"ERROR";

if($s3=="A") $as3=$g3*4;
else if($s3=="B+") $as3=$g3*3.5;
else if($s3=="B") $as3=$g3*3;
else if($s3=="C+") $as3=$g3*2.5;
else if($s3=="C") $as3=$g3*2;
else if($s3=="D+") $as3=$g3*1.5;
else if($s3=="D") $as3=$g3*1;
else if($s3=="F") $as3=$g3*0;
else return"ERROR";

return number_format(($as1+$as2+$as3)/$unit,2) ;
}
 ?>
