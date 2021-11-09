<?php

include('db.php');

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
} 



// echo "<pre>";
// print_r($_REQUEST);
 
// exit;


$email_address = $_REQUEST['email_address'];
$full_name = $_REQUEST['full_name'];
$pod_name = $_REQUEST['pod_name'];



$d = '';
$er = '';


$CheckUsername = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user_submissions WHERE full_name = '".str_replace(' ', '', trim($full_name))."' LIMIT 1"));
$CheckEmailaddress = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user_submissions WHERE email_address = '".trim($email_address)."' LIMIT 1"));

$CheckEmailUserName = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user_submissions WHERE email_address = '".trim($email_address)."' AND full_name = '".str_replace(' ', '', trim($full_name))."' LIMIT 1"));



if( empty($CheckUsername) && empty($CheckUsername)) {
	 
	  $d = 'DONE';
	  //echo 'success';
	  $er = '';
	 
} 

if( !empty($CheckUsername)) {
	
	if( ($CheckUsername['email_address'] == $email_address) && ( $CheckUsername['pod_name'] == $pod_name ) ) {
		  $er = '';
		  $d = 'DONE';
		  
	} else {
		
		if( ( $CheckUsername['email_address'] != $email_address ) && ( $CheckUsername['pod_name'] == $pod_name ) ) {
			
			 $d = '';
			 $er = "This username has already been used and connected to an email address, please try a different username or add the correct email address connected to the username .";
			
		}
		
		if( ( $CheckUsername['email_address'] != $email_address ) && ( $CheckUsername['pod_name'] != $pod_name ) ) {
			
			 $d = '';
			 $er = "This username has already been registered to one leaderboard so can't be connected to the other. Please try a different username.";
			
		}
		
	}
	
}


if( !empty($CheckEmailaddress)) {
	
	if( ($CheckEmailaddress['full_name'] == $full_name) && ( $CheckEmailaddress['pod_name'] == $pod_name ) ) {
		  
		  $er = '';
		  $d = 'DONE';
		  
	} else {
		
		if( ( $CheckEmailaddress['full_name'] != $full_name ) && ( $CheckEmailaddress['pod_name'] == $pod_name ) ) {
			
			 $d = '';
			 $er = "This email address has already been registered and connected to a username, please add the correct username connected to this email address.";
			
		}
		
		if( ( $CheckEmailaddress['full_name'] != $full_name ) && ( $CheckEmailaddress['pod_name'] != $pod_name ) ) {
			 $d = '';
			 $er = "This email address has already been registered to one leaderboard so can't be connected to the other. Please replay the game connected to the original colour leaderboard you chose.";
			
		}
		
	}
	
}

 
if(!empty($CheckEmailUserName)) {
	
	if($CheckEmailaddress['pod_name'] == $pod_name) {
		
			$er = '';
			$d = 'DONE';
			
		
	} else {
		$d = '';
		$er = "This username has already been registered to one leaderboard so can't be connected to the other. Please try a different username.";
		
	}
	
}

 

echo $d;

echo $er;

// $username = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user_submissions WHERE full_name = '".str_replace(' ', '', trim($_GET['full_name']))."' LIMIT 1"));
// if(empty($username)) {
//     $emailaddress = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user_submissions WHERE email_address = '".trim($_GET['email_address'])."' LIMIT 1"));
//     if(empty($emailaddress)) {
//         echo 'DONE';
//     } else {
//         if($_GET['pod_name'] != $emailaddress['pod_name']) {
//             echo "This email address has already been registered to one leaderboard so can't be connected to the other. Please replay the game connected to the original colour leaderboard you chose.";
//         } else {
//             if($_GET['full_name'] != $emailaddress['full_name']) {
//                 echo "This email address has already been registered and connected to a username, please add the correct username connected to this email address.";
//             } else {
//                 echo 'DONE';
//             }
//         }
//     }
// } else {
//     if($_GET['pod_name'] != $username['pod_name']) {
//         echo "This username has already been registered to one leaderboard so can't be connected to the other. Please try a different username.";
//     } else {
//         if($_GET['email_address'] != $username['email_address']) {
//             echo 'This username has already been used and connected to an email address, please try a different username or add the correct email address connected to the username.';
//         } else {
//             echo 'DONE';
//         }
//     }
// }
?>