<?php

$shop = mysqli_fetch_all(mysqli_query($db, "SELECT * FROM shop"));

echo JSON_encode($shop);