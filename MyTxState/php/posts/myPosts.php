<?php
    $serverName = "localhost";
    $userName = "admin";
    $password = "admin4321";
    $database = "my_txstate";
    $conn = new mysqli($serverName, $userName, $password, $database);
    
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    } else {
        $userQuery = "SELECT first_name, last_name FROM users";
        $userQueryResult = $conn->query($userQuery);
        if (!$userQueryResult) die($conn->error);
        $userQueryResult->data_seek(0);
        $userQueryResultRow = $userQueryResult->fetch_array(MYSQLI_ASSOC);
        
        $postsQuery = "SELECT * FROM user_posts ORDER BY post_date DESC, post_time DESC";
        $postsQueryResult = $conn->query($postsQuery);
        if (!$postsQueryResult) die($conn->error);
        
        $postsQueryResultNumOfRows = $postsQueryResult->num_rows;
        for ($j = 0; $j < $postsQueryResultNumOfRows; $j++) {
            $postsQueryResult->data_seek($j);
            $postsQueryResultRow = $postsQueryResult->fetch_array(MYSQLI_ASSOC);
?>
            <div class="postsContainer">
            	<img class="postsUserPic" src="/MyTxState/users/<?php echo strtolower($userQueryResultRow['first_name']) . '_' . strtolower($userQueryResultRow['last_name'])?>/profile_pic/profilePic.jpg"
            		alt="profilePic.jpg">
            	<div class="post">
            		<div class="postInfo">
            			<p class="postUserName"><?php echo $userQueryResultRow['first_name'] . " " . $userQueryResultRow['last_name']?></p>
            			<p class="postDate">Date posted: <?php echo date("m-d-Y",strtotime($postsQueryResultRow['post_date']))?></p>
            			<p class="postTime">Time: <?php echo date("g:i:s a", strtotime($postsQueryResultRow['post_time']))?></p>
            		</div>
            		<p class="userPost"><?php echo $postsQueryResultRow['post'];?></p>
            	</div>
            </div>
<?php 
        }
    }
    $userQueryResult->close();
    $postsQueryResult->close();
    $conn->close();
?>



















