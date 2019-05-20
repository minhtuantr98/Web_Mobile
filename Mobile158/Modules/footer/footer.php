<p>
                    2018 © Vietpro Academy. All rights reserved. Developed by Vietpro Software. 
</p>
 <?php
$fp = "count.txt";
$fo = fopen($fp, 'r');
$fr = fgets($fo);
$fc = fclose($fo);
echo "<p> Trang web của bạn đã có ".$fr." người truy cập </p>";
$fr++;
$fp = "count.txt";
$fo = fopen($fp, 'w');
$fw = fwrite($fo, $fr);
$fc = fclose($fo);
?> 
<?php
if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
        $timeout=1;// Thoi gian timeout, tinh bang phut
		// $id_onl=$row['user_id']; Lay id cua moi phien nguoi dung
		$user=$_SESSION['mail'];//lay session để kiểm tra là thành viên hay khách (Dựa vào session của trang đăng nhập, Chỉ cần khi nhúng vào trang web đang làm)
        //Xem id da co trong csdl hay chua
        $sql_check = "SELECT * from user where user_mail = '$user' ";
        $query_check = mysqli_query($conn,$sql_check);
        $row = mysqli_fetch_array($query_check);
        $id = $row['user_id'];
		$sql_onl="SELECT * from user_online where id = $id ";
		$rs_onl=mysqli_query($conn,$sql_onl);
		if(mysqli_num_rows($rs_onl)>0)
		{
			//Da co trong CSDL -> Cap nhat lai lastvisit
			  $sql_up="UPDATE user_online set lastvisit=unix_timestamp(),user='$user' where id=$id  ";
			  mysqli_query($conn,$sql_up);
		}
		else
		{
			//Chua co trong CSDL -> Thêm vào CSDL
			$sql_up="INSERT into user_online values ($id,unix_timestamp(),'$user')";
			mysqli_query($conn,$sql_up);
		}
		//Xoa nhung user da het thoi gian timeout
		$sql="DELETE from user_online where unix_timestamp()-lastvisit > $timeout * 60";
		mysqli_query($conn,$sql_onl);
	 
		//Lay so luong nguoi dang online
		$sql="SELECT * from user_online";
        $rs=mysqli_query($conn,$sql_onl);
        $num = mysqli_num_rows($rs);
        echo "<p> Số người đang onl :".$num;
       
    
		// $cnt=str_pad($r[0],3,'0',STR_PAD_LEFT);
		// $songuoionline="";
		// for($i=0;$i<strlen($cnt);$i++)
		// {
		// 	$digit=substr($cnt,$i,1);
		// 	$songuoionline.="<img src='images/$digit.png' width='16' align='absmiddle' height='21' />";
		// }
}
        ?>