<?php //blog.php
session_start();
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
// echo $_SESSION['uname'];
$con = new mysqli('localhost', 'root', '', 'fitnation');

?>
<html>

<head>
    <link rel="stylesheet" href="css/blog.css" type="text/css" />
    <link rel="shortcut icon" type="image/png" href="assets/img/logo.png">
    <title>Blog</title>
</head>

<body>
    <img src="assets/img/logo.png" id="logo">
    <a href="index.php" id="home">Home</a>

    <div id="feed">

        <img src="assets/icons/upIcon.png" id="upImg">

        <?php
        $stmt = $con->prepare('select Id , UserPosted , Likes , Time , Text , Image from posts');
        $stmt->execute();
        $result = $stmt->get_result();

        $posts = array();

        while ($post = $result->fetch_assoc()) {
            $stmt2 = $con->prepare('select First_Name from user where Username = ?');
            $stmt2->bind_param("s", $post["UserPosted"]);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            $fname = $result2->fetch_assoc();

        ?>
            <br>
            <div id="post">
                <div id="info">
                    <img src="assets/icons/userProfile.png" id="userImg">
                    <span id="Name"><?php echo $fname['First_Name']; ?> </span>
                    <span id="userName"><?php echo $post["UserPosted"]; ?> </span>
                    <span id="time"><?php echo $post["Time"]; ?></span>
                </div>
                <div id="postContent">
                    <div id="postText">
                        <p><?php echo $post["Text"]; ?></p>
                    </div>
                    <div id='divPostImg'><img id="postImg" src="<?php echo $post["Image"]; ?>"></div>
                </div>
                <div id="postIcons">
                    <span style="margin-right: 1%;"><?php echo $post["Likes"]; ?></span>
                    <?php $LikeId = $post["Id"];
                    echo "<a href=\"DB/connections/addLike.php?id=$LikeId\"><img id=\"like\" src=\"assets/icons/like2.png\"></a>" ?>
                    <!-- <?php $saveId = $post["Id"];
                            echo "<a href=\"DB/connections/addSave.php?id=$saveId\"><img id=\"save\" src=\"assets/icons/save.png\"></a>" ?> -->
                    <!-- <a href="DB/connections/addSave.php"><img id="save" src="assets/icons/save.png"></a> -->
                </div>
            </div>

        <?php }

        $stmt->close();
        ?>

    </div>

    <div id="rightSide">
        <form action="DB/connections/insertpost.php" method="post" id="newPost">
            <textarea name="textarea" id="textarea" placeholder="Whats on your mind" required></textarea><br>
            <!-- <input type="file" name="image" style="padding-top: 50%;" id="image"> -->
            <img src="assets/icons/uploadImg.png" id="uploadImg">
            <input type="submit" value="Push up" id="pushUp">
        </form>

        <!-- <a href="favoritePosts" id="favPosts">Favorite posts</a> -->
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