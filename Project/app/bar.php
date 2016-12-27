<?php session_start();
if(!$_SESSION["email"]){
header( "location: ./" );
exit(0);
}
 ?>

<div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="Data.php">PawarisaClinic</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      
          <li><a href="insert.php">เพิ่มบทความ</a></li> 
          <li><a href="showdata.php">แก้ไขบทความ</a></li> 
          <li><a href="https://calendar.google.com/calendar/render#main_7">ตารางนัดหมอ</a></li> 
          <li><a href="ResetPassword.php">เปลี่ยนรหัสผ่าน</a></li> 
          <li><a href="logout.php">ออกจากระบบ</a></li> 
          </ul>
    </div>
  </div>
</nav>