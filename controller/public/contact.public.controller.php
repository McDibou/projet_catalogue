<?php

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'contact.public.model.php';

$readShop = readShop($db);

if (isset($_POST['contact_mail'])) {

    $name_mail = analyseData($_POST['name_mail']);
    $subject_mail = analyseData($_POST['subject_mail']);
    $url_mail = analyseData($_POST['url_mail']);
    $content_mail = analyseData($_POST['content_mail']);

    if (!empty($name_mail) && !empty($subject_mail) && !empty($url_mail) && !empty($content_mail)) {

        $to = 'web2020.adrien@gmail.com';
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

        if (mail($to, $subject, $message, implode("\r\n", $header))) {

            $toRecp = $url_mail;
            $subjectRecp = $subject_mail;

            $messageRecp = '
             <html lang="fr">
                <body>
                <style type="text/css"></style>
                    <div>
                        <h3>Hello ' . $name_mail . '</h3>
                        <p>Thank you for your mail. We will answer you as soon as possible.</p>
                        <em><a href="http://adrien.webdev-cf2m.be/projet_catalog/public/"></a>http://adrien.webdev-cf2m.be/projet_catalog/public/</em>
                    </div>
                </body>
            </html>
            ';

            $headerRecp[] = 'MIME-Version: 1.0';
            $headerRecp[] = 'Content-type: text/html; charset=UTF-8';
            $headerRecp[] = 'From: ROBOT.CONTACT <robot.catalogue@gmail.com>';
            $headerRecp[] = 'X-Mailer: PHP/' . phpversion();

            if (mail($toRecp, $subjectRecp, $messageRecp, implode("\r\n", $headerRecp))) {

                $succes = 'Your message has been sent';
                $name_mail = $subject_mail = $url_mail = $content_mail = '';

            } else {
                $error = 'We couldn\'t send you a message';
            }

        } else {

            $error = 'We could not receive your message';

        }

    } else {

        $error = 'Please fill in all fields correctly';

    }
}


require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'contact.public.view.php';