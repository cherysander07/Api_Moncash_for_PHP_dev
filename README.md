# Moncash API PHP
This API will allow php developers to easily integrate the moncash payment method on their website.
# Structure
moncashPay/
moncashPay/config.php
moncashPay/controller.php
moncashPay/customReturnUrl.php
moncashPay/exec.php
moncashPay/MoncashManager.php
productPage.php
# Usage
Once you have included the MoncashPay folder in your project, you can click on the productPage file to see the moncash pay button.

To configure the API, open the configuration file and change the value of client secret and client id.

change the returnUrlBackHome value, you can put your index file.

In your Moncash sandbox add this at the end of your alert Url : moncashPay/customReturnUrl.php.

Copy the code from the productPage file into your own product file and be sure to replace the amount value and the identifier element value with your own information from your database.
# Security
If you discover any security issues, please email cherysander@gmail.com
# License
Contact Moncash for more details.
