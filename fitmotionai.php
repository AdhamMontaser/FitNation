<html>

<head>
    <title>Fit Motion Ai</title>
</head>

<style>
    html {
        overflow-y: hidden;
        overflow-x: hidden;
        position: fixed;
        top: -2%;
        height: 102%;
        width: 100%;
        font-family: 'Oswald', sans-serif;
    }

    body {
        width: 100%;
        height: 100%;
        position: relative;
        top: -3%;
        margin: 0;
        background-image: url(assets/img/SignUp_Background.jpg);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        color: white;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    h1 {
        margin-top: 7%;
        font-size: 35pt;
    }

    #fp {
        font-size: 20pt;
    }

    #sp {
        font-size: 15pt;
    }

    button {
        width: 165px;
        height: 62px;
        cursor: pointer;
        color: #fff;
        font-size: 17px;
        border-radius: 1rem;
        border: none;
        position: relative;
        background: #650000;
        transition: 0.1s;
    }

    button::after {
        content: '';
        width: 100%;
        height: 100%;
        background-image: radial-gradient(circle farthest-corner at 10% 20%, #650000 17.8%, #650000 100.2%);
        filter: blur(15px);
        z-index: -1;
        position: absolute;
        left: 0;
        top: 0;
    }

    button:active {
        transform: scale(0.9) rotate(3deg);
        background: radial-gradient(circle farthest-corner at 10% 20%, #650000 17.8%, rgb(255 255 255) 100.2%);
        transition: 0.5s;
    }

    #home {
        text-decoration: none;
        color: white;
        border-radius: 10%;
        padding: 0.5%;
        border: 1px solid #650000;
        background-color: #650000;
    }
</style>

<body>
    <h1>Fit Motion Ai model</h1>
    <p id="fp">A computer vision model to help you count and correct your push ups</p>
    <p id="sp">before we go, make sure that you are in a room with good lighting,</p>
    <p id="sp">and the camera captures your entire arm</p>
    <p>now you will be redirecting to jupyter notebook</p>
    <p>press run on the tool bar and give it some time to run,</p>
    <p>then the webcam will appear and the timer will start counting down</p>
    <p>press e on your keyboard to close the cam</p>
    <p>get ready</p>
    <br>
    <button id="openNotebook">START</button>
    <br><br>
    <?php
    if (isset($_GET['player_count'])) {
        session_start();
        echo ' your push up counter: ' . $_GET['player_count'] . '<br>';
        echo 'You can now see where you place within other users through the score board';
        $_SESSION['newScore'] = $_GET['player_count'];
        include 'DB/connections/updateScoreBoard.php';
    }

    ?>
    <br><br><br>
    <a href="index.php" id="home">Home</a>
    <script>
        document.getElementById("openNotebook").onclick = function() {
            window.open("http://localhost:8888/notebooks/fitnation/FitMotionAi.ipynb", "_self");
        };
    </script>

</body>

</html>