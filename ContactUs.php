<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //get form data
    $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    //validate form data
    $FormErrors = array();
    if (strlen($user) <= 3) {
        $FormErrors[] = 'Your name must be more than <strong>3</strong> characters.';
    }

    if (strlen($message) < 10) {
        $FormErrors[] = 'You massage must be more than <strong>10</strong> characters.';
    }
}
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initialscale=1.0">

        <title>Contact Us</title>

        <link rel="stylesheet" href="./Resources/CSS/bootstrap.min.css" />
        <link rel="stylesheet" href="./Resources/CSS/font-awesome.min.css" />
        <link rel="stylesheet" href="./Resources/CSS/contactus-style.css" />
    </head>
    <body>
        <!-- Start Form -->
        <div class="container">
            <h1 class="text-center">Contact Me</h1>
            <form class="contcat-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                <!-- Show the error messages-->
                <?php if (!empty($FormErrors)) { ?>
                    <div class="alert alert-danger">
                        <?php
                        foreach ($FormErrors as $FormError) {
                            echo $FormError . '<br />';
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>

                <div class="form-group">
                    <input type="text" name="username" class="form-control username" placeholder="Type your name" value="<?php
                    if (isset($user)) {
                        echo $user;
                    }
                    ?>" />
                    <i class="fa fa-user fa-fw"></i>
                    <i class="astr">*</i>
                    <div class="alert alert-danger custom-alert">Your name must be more than <strong>3</strong> characters.</div>
                </div>

                <div class="form-group">
                    <input type="email" name="email" class="form-control email" placeholder="Type availd email" value="<?php
                    if (isset($email)) {
                        echo $email;
                    }
                    ?>" />
                    <i class="fa fa-envelope fa-fw"></i>
                    <i class="astr">*</i>
                    <div class="alert alert-danger custom-alert">Your email can't be <strong>Empty</strong></div>
                </div>

                <div class="form-group">
                    <input type="tel" name="phone" class="form-control" placeholder="Type availd phone number" value="<?php
                    if (isset($phone)) {
                        echo $phone;
                    }
                    ?>" />
                    <i class="fa fa-phone fa-fw"></i>
                </div>

                <div class="form-group">
                    <textarea name="message" class="form-control message" placeholder="Type your massage"><?php
                        if (isset($message)) {
                            echo $message;
                        }
                        ?></textarea>
                    <i class="astr message-astr">*</i>
                    <div class="alert alert-danger custom-alert">You massage must be more than <strong>10</strong> characters.</div>
                </div>

                <input type="submit" value="Send Message" class="btn btn-primary" />
                <i class="fa fa-send fa-fw button-icon"></i>
            </form>
        </div>
        <!-- End Form-->

        <script src="./Resources/JS/jquery.min.js"></script>
        <script src="./Resources/JS/bootstrap.min.js"></script>
        <script src="./Resources/JS/FormErrors.js"></script>
    </body>
</html>



