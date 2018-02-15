### PHPreCAPTCHA v0.1
PHP library for reCAPTCHA V2.0

This simple reCAPTCHA PHP Library provides a way to place a CAPTCHA on your PHP website, helping you stop bots from abusing it. The library wraps the reCAPTCHA API.

### Client Side (How to make the CAPTCHA box show up in your website)
The easiest method for rendering the reCAPTCHA widget on your page is to include the necessary JavaScript resource and a g-recaptcha tag. The g-recaptcha tag is a DIV element with class name 'g-recaptcha' and your site key in the data-sitekey attribute:

```html
<html>
  <head>
    <title>reCAPTCHA demo: Simple page</title>
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
    <form action="?" method="POST">
      <div class="g-recaptcha" data-sitekey="your_site_key"></div>
      <br/>
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
```

### Server Side (How to test if the user entered the right answer)

The following code should be placed at the top of your verify.php file:
```php
<?php
require_once('recaptchalib.php');
$secretkey = "your_secret_key";
$response = $_POST["g-recaptcha-response"];
$verify = new recaptchalib($secretkey, $response);

if ($verify->isValid() == false) {
// What happens when the CAPTCHA was entered incorrectly
die ("The reCAPTCHA wasn't entered correctly. Go back and try it again.");
} else {
// Your code here to handle a successful verification
}
?>
```

PHPreCAPTCHA v0.1
GNU General Public License v3.0
This is a PHP library for Google's reCAPTCHA V2.0
Created by Martin Georgiev, geeorgiev[at]gmail.com
Web: www.viziongames.com
