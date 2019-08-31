<?php
$serverName = "localhost";
$userName = "admin";
$password = "admin4321";
$database = "my_txstate";

$conn = new mysqli($serverName, $userName, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $userQuery = "SELECT * FROM users";
    $userQueryResult = $conn->query($userQuery);

    if (! $userQueryResult)
        die($conn->error);
    else {
        $userQueryResult->data_seek(0);
        $userQueryResultRow = $userQueryResult->fetch_array(MYSQLI_ASSOC);
        ?>
        <section id="userInfoSection" class="clearfix">
        	<h3 id="userName"><?php echo $userQueryResultRow['first_name'] . " " . $userQueryResultRow['last_name']?></h3>
        	<div id="imgAndInfoContainer">
        		<img id="profileImg"
        			src="/MyTxState/users/<?php echo strtolower($userQueryResultRow['first_name']) . '_' . strtolower($userQueryResultRow['last_name'])?>/profile_pic/profilePic.jpg"
        			alt="profilePic.jpg">
        		<div id="userInfoContainer">
        			<p id="age">Age: <?php echo $userQueryResultRow['age']?></p>
        			<p id="major">Major: <?php echo $userQueryResultRow['major']?></p>
        			<p id="hometown">Hometown: Crockett, TX</p>
        			<p id="classification">Classification: <?php echo $userQueryResultRow['classification']?></p>
        			<p id="graduationDate">Graduation date: <?php echo date("m-d-Y", strtotime($userQueryResultRow['graduation_date']))?></p>
        		</div>
        	</div>
        	<div id="aboutMeSection">
        		<h3>About me!</h3>
        		<p><?php echo $userQueryResultRow['about_me_info']?></p>
        	</div>
        </section>
<?php
    }
}
$userQueryResult->close();
$conn->close();
?>



















