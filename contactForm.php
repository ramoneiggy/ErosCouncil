<?php

include "classes.php";

if (isset($_POST['submit'])) {

        $name = test::input($_POST['name']);
        $subject = test::input($_POST['subject']);
        $mailFrom = test::input($_POST['mail']);
        if (!filter_var($mailFrom, FILTER_VALIDATE_EMAIL)) {
                die;
                header("Location: contact.php?mail=invalidFormat");
              }
        $message = test::input($_POST['message']);

        $mailTo = "contact@eroscouncil.com";
        $headers = "From: ".$mailFrom;
        $txt = "You have received an e-mail from ".$name.".\n\n".$message;

                    mail($mailTo, $subject, $txt, $headers);
                    header("Location: contact.php?mail=Sent#toMe");
}