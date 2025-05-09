<?php

session_start();
session_unset();
session_destroy();


header("Location: ../index.php");
die(); // Always good to add exit() or die () after header
