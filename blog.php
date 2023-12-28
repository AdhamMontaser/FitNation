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
                <a href="index.php">
                    <img src="assets/img/logo.png" alt="logo" />
                </a>
            </div>
            <ul class="navigation-bar-options">
                <li><a href="index.php">home</a></li>
                <li><a href="about.php">about</a></li>
                <li><a href="blog.php">blog</a></li>
                <li><a href="worldmap.html">locations</a></li>
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

    <div id="posts">

        <img src="assets/icons/upImg.png" id="upImg">

        <table id="tableFeed">
            <tr id="tableRow">
                <td id="tdImg"><img src="assets/img/team2.png" id="userImg"></td>
                <td class="tdTable"><span id="Name"><?php echo "Ali" . "hisham" ?> </span></td>
                <td class="tdTable"><span id="userName"><?php echo "ali123" ?> </span></td>
                <td id="tdTime"><span id="time"><?php echo "2 weeks ago" ?></span></td>
                <td id="test"></td>
                <td id="test"></td>
            </tr>
            <tr>
                <td colspan="4">
                    <p id="postText"><?php echo "WELCOME to our blog" ?></p>
                    <span id="postImg"></span>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <a href="" id="like"><img src="assets/icons/dumbell.png"></a>
                </td>
            </tr>
            <!-- <tr><td>
                <img src="assets/img/team3.png" id="userImg">
                <span><?php echo "Ali" . "hisham" ?> </span>
                <span><?php echo "ali123" ?> </span>
                <span><?php echo "2 weeks ago" ?></span>
                <p><?php echo "WELCOME to our blog" ?></p>
            </td></tr> -->
        </table>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <p style="color:aqua">test</p>
    </div>

    <div id="rightSide">
        <form action="" method="get" id="newPost">
            <textarea name="textarea" id="textarea" placeholder="Whats on your mind"></textarea><br>
            <!-- <input type="file" name="image" id="image"> -->
            <img src="assets/icons/image.png" id="uploadImg">
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