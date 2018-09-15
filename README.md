PHP mail sender (CEDA Health)
====================

**Config**

* `config/mail-auth.ini` file contains email auth and other important configs

**Project**

* `/index.php` will redirect to `/src/index.php`
* packages used: 
    * `composer`
    * [`php mailer`](https://github.com/PHPMailer/PHPMailer)
* on submission of form of `/src/index.php` will redirect to `/src/mail.php`
* email template declared as string inside '/src/mail.php'

