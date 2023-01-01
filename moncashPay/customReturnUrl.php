<?php
/**
 * Add this end url to { Alert url } Moncash => moncashPay/customReturnUrl.php
 * EX : http://localhost/myProject/moncashPay/customReturnUrl.php
 * this return url allow you to capture data of transaction
 */
  require_once 'controller.php';
  $transactionId = trim($_GET['transactionId']);
  returnUrl($transactionId);
  ?>
