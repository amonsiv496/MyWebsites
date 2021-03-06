<?php $serverName = "localhost";
$userName = "admin";
$password = "admin4321";
$database = "my_txstate";?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>MyTxState</title>
<link rel="stylesheet" type="text/css" href="/MyTxState/css/index.css">
<link
	href="https://fonts.googleapis.com/css?family=PT+Sans|Rubik|Noto+Serif|Source+Sans+Pro|Lato"
	rel="stylesheet">
</head>
<body class="clearfix">
	<?php include ('../../html/header.html'); ?>

	 <section id="userInfoAndPostsSectionSuperContainer">
		<?php include ('../userInfo.php'); ?>
    	<section id="postsSection">
    		<form id="typePostContainer" method="POST">
    			<input id="friendsPostsTab" type="submit" name="friendsPostsBtn" value="Friends' Posts"> 
    			<input id="campusPostsTab" type="submit" name="campusPostsBtn" value="Campus' Posts"> 
    			<input id="myPostsTab" type="submit" name="myPostsBtn" value="My Posts">
    		</form>
    		
    		<form id="userCommentInputSection" method="POST">
    			<textarea id="postInputArea" name="userPost" rows="5" cols="100"></textarea>
    			<br>
    			<input id="userInputPostButton" type="submit" name="userInputPostButton" value="Post">
    		</form>
    		<?php
    		$conn = new mysqli($serverName, $userName, $password, $database);
    		if ($conn->connect_error){
    		    die("Connection failed: " . $conn->connect_error);
    		} else {
                if (isset($_POST['friendsPostsBtn'])) {
                    header('Location: myProfileMyFriendsPosts.php');
                } elseif (isset($_POST['campusPostsBtn'])) {
                    header('Location: myProfileCampusPosts.php');
                } elseif (isset($_POST['myPostsBtn'])) {
                    header('Location: ../../myProfile.php');
                }
    		}
    		include ('../posts/campusPosts.php');
            ?>
    	</section>
	 </section>
</body>
</html>