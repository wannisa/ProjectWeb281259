<?php session_start();
if(!$_SESSION["email"]){
header( "location: ./" );
exit(0);
}
 ?>

<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<style type="text/css">

body {
    background-image: url(images/login.png);
    background-position: center top;
    background-size: 100% auto;
    background-repeat: repeat-x;
}

</style>
<meta charset="utf-8">
<body>
</body>
<div id="insert" style="padding-top:350px;"  >
<div style="padding-left:100px;" >
        <button onclick="window.location.href='insert.php'" type="button" name="button" id="button" style="width:400; height:50;" class="btn btn-danger">
        <font size="5">เพิ่มบทความ</font></button>
      <div style="padding-left:0px; padding-top:20px;" >
            <button onclick="window.location.href='showdata.php'" type="button" name="button" id="button" style="width:400; height:50;" class="btn btn-danger">
        <font size="5">แก้ไขบทความ</font></button>
       <div style="padding-left:0px; padding-top:20px;" >
      <button onclick="window.open('https://calendar.google.com/calendar/render#main_7')" type="button" name="button" id="button" style="width:400; height:50;" class="btn btn-danger">
       <font size="5">ตารางนัดหมอ</font></button>
       <div style="padding-left:0px; padding-top:20px;" >
      <button onclick="window.location.href='ResetPassword.php'" type="button" name="button" id="button" style="width:400; height:50;" class="btn btn-danger">
       <font size="5">เปลี่ยนรหัสผ่าน</font></button>
       <div style="padding-left:0px; padding-top:20px;" >
      <button onclick="window.location.href='logout.php'" type="button" name="button" id="button" style="width:400; height:50;" class="btn btn-danger">
       <font size="5">ออกจากระบบ</font></button>



		</div>
		</div>
	