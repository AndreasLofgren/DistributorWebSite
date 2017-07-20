<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo '<h2 id="sign-up-title">Sign up</h2>';
//echo '<p id="msg">Signing up is restricted due to maintenance!</p>';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    /*the form hasn't been posted yet, display it
      note that the action="" will cause the form to post to the same page it is on */
    ?>
    <script>
        var onloadCallback = function() {
            grecaptcha.render('recaptcha_element', {
                'sitekey' : '6LesTiUUAAAAADjKMN5kWB0ZaWOwgaMyVvZDKQC8'
            });
        };
    </script>
    <div id="form-sign-up">
        <form id="sign-up-form" class="col-sm-6 form-horizontal" action="" method="post">
            <div class="form-group">
                <label for="user_name">Username: </label>
                <input type="text" class="form-control" id="name" name="name"
                       placeholder="Your user name!">
            </div>
            <div class="form-group">
                <label for="user_pass">Password: </label>
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="Type your password!">
            </div>
            <div class="form-group">
                <label for="user_pass_check">Retype your password: </label>
                <input type="password" class="form-control" id="password_check" name="password_check"
                       placeholder="Retype your password!">
            </div>
            <div class="form-group">
                <label for="user_email">E-mail</label>
                <input type="email" class="form-control" id="mail" name="mail"
                       placeholder="Type your email!"></input>
            </div>
            <div class="form-group" id="recaptcha_element"></div>
            <button type="submit" class="btn btn-primary" name="submitButton" id="sign-up-btn">Create Account</button>
        </form>
        <!--<form action="?" method="POST">
            <div id="recaptcha_element"></div>
            <br/>
            <input type="submit" value="Submit">
        </form>-->
    </div>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
            async defer>
    </script>
    <?php
} else {
    
    //checking the recaptcha response from google API
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $response = $_POST['g-recaptcha-response'];
    $data = array("secret" => "6LesTiUUAAAAAFF_9QiLm6fqdOS5kKVjmRNRbzK4", "response" => "$response");
    
    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    
//    if ($result === FALSE) { /* Handle error */ }
    
    $oResponse = json_decode($result, true);
//    var_dump( "response: " , $oResponse['success']);
    
    /* if the form has been posted, we'll process the data in three steps:
        1.  Check the data
        2.  Let the user refill the wrong fields (if necessary)
        3.  Save the data
    */
    $errors = array(); /* declare the array for later use */
    
    if(!$oResponse['success']){
        $errors[] = 'Please check you are a human with "reCAPTCHA" tool!';
    } else
    
        if (isset($_POST['name'])) {
        //the user name exists
        if (!ctype_alnum($_POST['name'])) { //check for alphanumeric chars
            $errors[] = 'The username can only contain letters and digits.';
        }
        if (strlen($_POST['name']) > 30) {
            $errors[] = 'The username cannot be longer than 30 characters.';
        }
    } else {
        $errors[] = 'The username field must not be empty.';
    }
    
    
    if (isset($_POST['password'])) {
        if ($_POST['password'] != $_POST['password_check']) {
            $errors[] = 'The two passwords did not match.';
        }
    } else {
        $errors[] = 'The password field cannot be empty.';
    }
    
    if (!empty($errors)) /*if the errors array is not empty display them...*/ {
        echo '<p id="reg-msg">A couple of fields are not filled in correctly!<p>';
        echo '<ul>';
        foreach ($errors as $key => $value) /* walk through the array so all the errors get displayed */ {
            echo '<li><p id="reg-msg">' . $value . '</p></li>'; /* this generates a nice error list */
        }
        echo '</ul>';
    } else
//        echo "<p id='msg'> You can't sign up right now!</p>";
    /*UNTIL SECURITY IS ADDED LEAVE THESE COMMENTED!*/
        {
        //save the user details in the db
        $sql = $conn->prepare('call insertUser(:user_name, :user_pass, :user_email, NOW(), 0)');

        $value1 = val($_POST['user_name']);
        $sql->bindParam(':user_name', $value1, PDO::PARAM_STR, 4000);

        $value2 = hash_bcrypt($_POST['user_pass']);
        $sql->bindParam(':user_pass', $value2, PDO::PARAM_STR, 4000);

        $value3 = val( $_POST['user_email']);
        $sql->bindParam(':user_email', $value3, PDO::PARAM_STR, 4000);

        $result = $sql->execute();
        if (!$result) {
            //something went wrong, display the error
            echo '<p id="reg-msg">Something went wrong while registering. Please try again later. Possible reasons: user or email already exist.<p>';
            //echo mysql_error(); //debugging purposes, uncomment when needed
        } else {
            echo '<p class="msg">Successfully registered. You can now <a class="reg-msg" href="signIn.php">sign in</a> and start posting!</p>';
        }
    }
}