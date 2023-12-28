<html>

<head>
    <link rel="stylesheet" href="css/blog.css" type="text/css" />
    <link rel="shortcut icon" type="image/png" href="assets/img/logo.png">
    <title>Blog</title>
</head>

<body>
    <nav>
        <div class="navigation-bar">
            <div class="navigation-bar-logo">
                <img src="assets/img/logo.png" alt="logo" />
            </div>
            <ul class="navigation-bar-options">
                <li><a href="index.php">home</a></li>
                <li><a href="">about</a></li>
                <li><a href="">courses</a></li>
                <li><a href="">pricing</a></li>
                <li><a href="">gallery</a></li>
                <li><a href="blog.php">blog</a></li>
                <li><a href="">contact</a></li>
            </ul>
            <?php
            session_start();
            if (isset($_SESSION['user'])) {
                echo '<a href="logout.php"><button class="sign-in-button">sign out</button></a>';
            } else {
                echo '<a href="login.php"><button class="sign-in-button">sign in</button></a>';
            }
            ?>

        </div>
    </nav>

    <div id="feed">

        <img src="assets/icons/upIcon.png" id="upImg">

        <div id="post">
            <div id="info">
                <img src="assets/img/team2.png" id="userImg">
                <span id="Name"><?php echo "Ali" . "hisham" ?> </span>
                <span id="userName"><?php echo "ali123" ?> </span>
                <span id="time"><?php echo "2 weeks ago" ?></span>
            </div>
            <div id="postContent">
                <div id="postText"><p><?php echo "WELCOME to our website" ?></p></div>
                <div id='divPostImg'><img id="postImg" src="assets/img/team2.png"></div>
            </div>
            <div id="postIcons">
                    <a href=""><img id="like" src="assets/icons/like2.png"></a>
                    <a href=""><img id="save" src="assets/icons/save.png"></a>
            </div>
        </div>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <p style="color:aqua">test</p>
    </div>

    <div id="rightSide">
        <form action="" method="get" id="newPost">
            <textarea name="textarea" id="textarea" placeholder="Whats on your mind"></textarea><br>
            <!-- <input type="file" name="image" id="image"> -->
            <img src="assets/icons/uploadImg.png" id="uploadImg">
            <input type="submit" value="Push up" id="pushUp">
        </form>

        <a href="favoritePosts" id="favPosts">Favorite posts</a>
    </div>

    <script>
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            var upImg = document.getElementById('upImg');

            upImg.addEventListener('click', function() {
                scrollToTop();
            });
        });
    </script>
</body>

</html>