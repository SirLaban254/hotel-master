<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Magestic Hotel</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="dist/pickmeup.min.js"></script>
    <script type="text/javascript" src="dist/handleCounter.js"></script>
    <link rel="stylesheet" type="text/css" href="css/pickmeup.css">
    <link rel="stylesheet" type="text/css" href="css/handle-counter.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script type="text/javascript" src="dist/jquery.scrollUp.js"></script>
    <script type="text/javascript" src="dist/demo.js"></script>

    <!-- Replace YOUR_API_KEY with your actual Google Maps API key -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
    <?php include_once ("template/nav.php"); ?>

    <?php require_once ("includes/db2_connect.php"); ?>


    <?php
    if (isset($_POST["send_message"])) {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $num = mysqli_real_escape_string($conn, $_POST["phone_number"]);
        $message = mysqli_real_escape_string($conn, $_POST["message"]);

        $insert_message = "INSERT INTO guests (email, phone_number, message) VALUES ('$email', '$num', '$message')";

        if ($conn->query($insert_message) === TRUE) {
            header("Location: View_Messages.php");
            exit();
        } else {
            echo "Error: " . $insert_message . "<br>" . $conn->error;
        }
    }
    ?>
</head>

<body style="background-color: rgb(230, 210, 220);">


    <section class="tm-main">
        <p>Contact</p>
    </section>

    <section class="tm-booking">
        <form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="contacts_form">
            <label for="em">Email Address:.</label><br>
            <input type="email" id="em" placeholder="Email Address" name="email" required><br><br>

            <!-- Assuming you have a field for phone number -->
            <label for="phone">Phone Number:</label><br>
            <input type="text" id="phone" placeholder="Phone Number" name="phone_number" required><br><br>

            <label for="message">Message:</label><br>
            <textarea name="message" id="message" cols="30" rows="5" required></textarea><br><br>

            <input type="submit" name="send_message" value="Send Message">
        </form>

        <div class="vertical-line"></div>

        <div class="tm-form2">
            <div class="tm-cl">
                <p class="here">We are situated over here</p>
                <img id="place" src="images/placeholder.png">
                <div id="map"></div>
            </div>
        </div>
    </section>

    <?php include_once ("template/footer.php"); ?>

    <footer class="tm-footer">
        <div class="tm-us">
            <p class="bold">About Us</p>
            <p>We are a part of chain of luxury hotels which extends all over the world. We provide a luxurious stay
                with various value-added and free services which will make you visit us over and over again.</p>
        </div>

        <br />
        <div class="tm-media">
            <a href="#"> <img src="images/fb.png"></a>
            <a href="#"> <img src="images/G.png"> </a>
            <a href="#"> <img src="images/twittr.png"> </a>
            <a href="#"> <img src="images/insta.png"> </a>
        </div>
    </footer>

</body>

</html>