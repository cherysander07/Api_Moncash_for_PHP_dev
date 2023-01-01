    <?php
require_once 'controller.php';
$amount = htmlspecialchars($_POST['amount']);
$idItem = htmlspecialchars($_POST['idItem']);
$orderId = time() . $idItem;
configMoncash($amount,$orderId);

