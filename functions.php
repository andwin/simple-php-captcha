<?php

function isCaptchaValid() {
  if (!isset($_REQUEST['captcha']))
    return false;

  if (!isset($_SESSION['captcha']))
    return false;

  return strtoupper($_REQUEST['captcha']) == strtoupper($_SESSION['captcha']);
}