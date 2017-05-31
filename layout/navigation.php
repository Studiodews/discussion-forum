<div id="menu">
		<a class="item" href="index.php">Home</a> 
        <?php
        if(isset($_GET['signout']))
        {
            logout();
        }
        if(isSignedIn())
        {
            echo '- <a class="item" href="newtopic.php">Create a topic</a> ';
            if($_SESSION['userLevel']==1)
            {
                echo '- <a class="item" href="newcat.php">Create a category</a> ';
            }
            echo "</div>";
            echo '<div id="userbar">';
            echo 'Hello ' . $_SESSION['userName'] . '  | <a href="./?signout">Sign out</a>';
        } 
        else
        {
            echo "</div>";
            echo '<div id="userbar">';
            echo '<a href="signin.php">Sign in</a> or <a href="signup.php">register</a>.';
        }
        ?>
		
		
	</div>
    <div id="content">