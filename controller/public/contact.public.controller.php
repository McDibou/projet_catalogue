<?php

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'contact.public.model.php';

$readShop = readShop($db);

if (isset($_POST['contact_mail'])) {

    $name_mail = analyseData($_POST['name_mail']);
    $subject_mail = analyseData($_POST['subject_mail']);
    $url_mail = analyseData($_POST['url_mail']);
    $content_mail = analyseData($_POST['content_mail']);

    if (!empty($name_mail) && !empty($subject_mail) && !empty($url_mail) && !empty($content_mail)) {

        $to = $url_mail;
        $subject = $subject_mail;

        $message = '
            <html lang="fr">
                <body>
                <style type="text/css"></style>
                    <div>
                        <h3>' . $name_mail . '</h3>
                        <p>' . $content_mail . '</p>
                    </div>
                </body>
            </html>
        ';

        $header[] = 'MIME-Version: 1.0';
        $header[] = 'Content-type: text/html; charset=UTF-8';
        $header[] = 'From: ROBOT.CONTACT <robot.catalogue@gmail.com>';
        $header[] = 'X-Mailer: PHP/' . phpversion();

        if(mail($to, $subject, $message, implode("\r\n", $header))) {

            $succes = 'succes';
            $name_mail = $subject_mail = $url_mail = $content_mail = '';

        } else {

            $error = 'error2';

        }

    } else {

        $error = 'error';

    }
}


require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'contact.public.view.php';