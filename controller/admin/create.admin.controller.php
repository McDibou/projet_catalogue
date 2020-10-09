
<?php

require_once dirname(dirname(__DIR__)) .  DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'create.admin.model.php';

$article = readArticle($db);

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR. 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'create.admin.view.php';