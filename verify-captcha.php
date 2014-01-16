<?php

session_start();

if (isset($_REQUEST['captcha']) && isset($_SESSION['captcha'])) {
  echo json_encode(strtoupper($_REQUEST['captcha']) == strtoupper($_SESSION['captcha']));
} else {
  echo 'false';
}