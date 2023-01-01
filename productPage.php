<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product page</title>
</head>
<body>
    <h1>PRODUCT</h1>
   <?php
   /* COPY THIS CODE AND PUT IT IN YOUR PRODUCT PAGE BELLOW WHAT YOU WANT TO SELL */

$amount = 350; // add the amount of your product here
$idItem = '123';  // add the Id product here
   ?> 
   <!-- Modify path if your product page is in a folder -->
   <form action="moncashPay/exec.php" method="POST">
<input type="hidden" name="amount" value="<?= $amount; ?>">
<input type="hidden" name="idItem" value="<?= $idItem; ?>">
<input type="image" src="https://sandbox.moncashbutton.digicelgroup.com/Moncash-middleware/resources/assets/images/MC_button_kr.png" style="width:200px">
</form>
    <!-- END OF CODE -->

</body>
</html>