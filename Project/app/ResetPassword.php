<?php session_start();
if(!$_SESSION["email"]){
header( "location: ./" );
exit(0);
}


mysql_connect("ap-cdbr-azure-southeast-b.cloudapp.net","b6b0b7800c86fb","3b13daae");
	mysql_select_db("pawarisaclinic");
?>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>

<script type="text/javascript">

$(document).ready(function () {
   $("#password2, #password3").keyup(checkPasswordMatch);
});

function checkPasswordMatch() {
    var password = $("#password2").val();
    var confirmPassword = $("#password3").val();

    var password_length = $('#password2').val().length;
    var confirmPassword_length = $('#password3').val().length;

    if(password_length < 6) {
    	$('#submit').prop('disabled', true);
    	$("#divCheckPasswordMatch").html("<font color='red'>กรุณากรอกรหัสผ่าน 6 ตัวอักษรขึ้นไป!</font>");
    	        $('#submit').prop('disabled', true);
    } else {
    	if (password != confirmPassword) {
    	        $("#divCheckPasswordMatch").html("<font color='red'>รหัสผ่านไม่ตรงกัน!</font>");
    	        $('#submit').prop('disabled', true);
    	}
    else {
    	        $("#divCheckPasswordMatch").html("<font color='green'>รหัสผ่านตรงกัน</font>");
    	        $('#submit').prop('disabled', false);
    	}
    }
}

$(document).ready(function () {
    var elements = document.getElementsByTagName("input");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function (e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                switch (e.srcElement.id) {
                    case "password1":
                        e.target.setCustomValidity("กรุณากรอกรหัสผ่านเดิม");
                        break;
                }
            }
        };
        elements[i].oninput = function (e) {
            e.target.setCustomValidity("");
        };
    }
})

</script>
</head>

<style type="text/css">

body {
    background-image: url(images/login.png);
    background-position: center top;
    background-size: 100% auto;
    background-repeat: repeat-x;
}

</style>
<body>

<?php 
// Reset Password
if(isset($_POST["submit"])){
	$getpassword1 = hash("sha256", $_POST["password1"]);
	$getpassword2 = hash("sha256", $_POST["password2"]);
	$getEmailFromSession = $_SESSION["email"];
	$sql = "SELECT password FROM admin WHERE password = '$getpassword1'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);

	if($row["password"] == $getpassword1) {
		// If found old password in the database
		// I will update old password to a new one.
		$sqlUpdatePass = "UPDATE admin SET password = '$getpassword2' WHERE email = '$getEmailFromSession'";
		$resultUpdate = mysql_query($sqlUpdatePass);
		?>

		<SCRIPT LANGUAGE="JavaScript">
			alert("Reset รหัสผ่านเรียบร้อยแล้ว")
			window.location.href = "https://surasak.io/pawarisaclinic/Data.php";
		</script>

	<?php } else { ?>

		<SCRIPT LANGUAGE="JavaScript">
			alert("คุณกรอกรหัสผ่านเก่าไม่ถูกต้อง")
		</script>

	<?php }

}
?>

<form method="post" action="ResetPassword.php">
	<div id="loginbox" style="padding-top:380px;" class="col-lg-6" >

		<div style="padding-left:80px";>
		รหัสผ่านเดิม <input type="password" required="" title="กรุณากรอกรหัสผ่านเดิม" id="password1" name="password1" size="20" class="form-control" placeholder="รหัสผ่านเดิม" style="width:470;"/><br />
		รหัสผ่านใหม่ <input type="password" id="password2" name="password2" size="20" class="form-control" placeholder="รหัสผ่านใหม่" style="width:470;"/><br />
		ยืนยันรหัสผ่านใหม่ <input type="password" id="password3" onChange="checkPasswordMatch();" name="password3" size="20" class="form-control" placeholder="ยืนยันรหัสผ่านใหม่" style="width:470;"/><br />
		<div class="registrationFormAlert" id="divCheckPasswordMatch">
		</div>
		<div style="padding-left:350px";>
       	<button type="submit" name="submit" id="submit" class="btn btn-danger" >ยืนยัน</button>
        <button type="submit" name="cancel" id="cancel" class="btn btn-info" onclick="window.location.href='Data.php'" >ยกเลิก</button>


		</div>
		</div>
	</div>

</from>
</body>