<?php


echo "Page Logut";

session_start();
session_unset();
session_destroy();

exit();
