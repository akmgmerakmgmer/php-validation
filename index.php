<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP Validation</title>
</head>
<body>

    <form action="aftersubmit.php" method="POST">
        <input type="text" name="name" placeholder="Enter Your Name" required><br>
        <?php
            if(isset($_GET['nerr']) && $_GET['nerr'] == 1) :
        ?>
        <span style="color:red">* Only letters and spaces are allowed</span><br>
        <?php
            endif;
        ?>
        <input type="email" name="email" placeholder="Enter Your Email " required><br>
        <?php
            if(isset($_GET['emerr']) && $_GET['emerr'] == 1) :
        ?>
        <span style="color:red">* Invalid Email</span><br>
        <?php
            endif;
        ?>
         <?php
            if(isset($_GET['exterr']) && $_GET['exterr'] == 1) :
        ?>
        <span style="color:red">Unvalid Extention</span><br>
        <?php
            endif;
        ?>
        <input type="text" name="phone" placeholder="Enter Your Number" required><br>
        <?php
            if(isset($_GET['pherr']) && $_GET['pherr'] == 1) :
        ?>
        <span style="color:red">* Phone number should be 11 digits only And Contain Only Numbers</span><br>
        <?php
            endif;
        ?>
        <textarea name="area"  cols="30" rows="10" placeholder="Enter Your Message"></textarea><br>
        <input type="submit" class="button">
    </form>
   
</body>
</html>