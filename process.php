<?php
	require_once 'connect.php';  //for connection of db

	if(isset($_POST['submit'])){ //registered users details checking and insertion
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$dob = $_POST['dob'];
		$gender = $_POST['gender'];

		$cquery="SELECT * FROM users WHERE email = '$email' ";
		$result = mysqli_query($conn,$cquery);
		if(mysqli_num_rows($result)>0)
			echo 0;
		else{
			$query = "INSERT INTO users(name, email, phone, dob, gender) VALUES('$uname','$email','$phone','$dob','$gender') ";
			if(mysqli_query($conn,$query)){

				$subject = 'Thank you for registering with us';
				$body = '<i>Thank you for registering with us <b>'.$uname.'</b></i>';
				$altbody = 'Thank you for registering with us '.$uname;
				$attach = false;
				require_once 'mail.php'; //for sending mail
				if($attach)
					echo 1;
				else echo -2;
			}
			else echo -1;
		}
	}
	elseif ($_POST['change_status']) { //selection and rejection of students
		$email = $_POST['email'];
		$status=0;
		$uname = $_POST['uname'];
		if($_POST['status']=="Select")
			$status=1;
		else if($_POST['status']=="Reject")
			$status=-1;

		$query = "UPDATE users SET status = '$status' WHERE email = '$email' ";
		if(mysqli_query($conn,$query)){
			if($status==1){ //when a student is selected then sends a mail with pdf
				$attach = true;
				$subject = 'Congratulations!!';
				$body = '<i>Congratulations!! <b>'.$uname.' You are selected.</b></i>';
				$altbody = 'Congratulations!! You are selected.'.$uname;
				require_once 'mail.php';
				if($attach){
					$query = "UPDATE users SET mail_sent = 1 WHERE email = '$email' ";
					mysqli_query($conn,$query);
					echo 'mail sent';
				}else echo 'not sent';
			}
			else echo 'Done';
		}
		else echo 'Try later';
	}

?>