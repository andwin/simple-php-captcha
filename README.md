# simple-php-captcha

## What is this?

I needed a [Captcha](http://en.wikipedia.org/wiki/CAPTCHA) that was simple to use with  PHP and worked well with the [jQuery Validation Plugin](http://jqueryvalidation.org/). After looking around for a while without finding anything good I decided to write my own.
It's certainly not as sophisticated as the more popular alternatives like [reCAPTCHA](http://www.google.com/recaptcha) or [Are You a Human](http://areyouahuman.com/), but it works much better with jQuery Validation.
You can also customize this Captcha to use a font that is simpler to read, making it easier for your visitors while still having some protection against spam bots.

## How do I use it?

Add the Captcha to your form like this:

```html
<div class="fieldgroup">
  <label for="message1">Captcha</label>
  <div id="captcha-wrapper" class="controls">
    <img src="generate-captcha.php" alt="Captcha Image" id="captcha-image" />
    <img src="/img/refresh.png" alt="Refresh Captcha" title="Refresh Captcha" id="refresh-captcha" />
  </div>
  <input type="text" name="captcha" id="captcha" />
</div>
```

It creates the captcha image, a refresh button to generate a new captcha image and an input field to enter the captcha text into.

Add your captcha validation rule like this:

```
rules: {
  captcha: {
    required: true,
    remote: {
      url: 'verify-captcha.php',
      type: 'post',
      data: {
        username: function() {
          return $( '#captcha' ).val();
        }
      }
    }
  }
}
```
And an error message for wrongly entered captcha text like this:

```
messages: {
  captcha: {
    remote: "Enter the correct text"
  }
}
```

And finally this code to make the refresh button work:

```javascript
$('#refresh-captcha').click(function(){
  $('#captcha-image').attr('src', 'generate-captcha.php?r=' + Math.random());
    return false;
});
```

Have a look at [sample-form-with-validate.html](https://github.com/andwin/simple-php-captcha/blob/master/sample-form-with-validate.html)

### To validate the captcha on the backend

First include functions.php and call session_start();

```php
<?php
include 'functions.php';
session_start();
?>
```

Call the function isCaptchaValid() to find out if the correct captcha text was entered.

```php
<?php
if (isCaptchaValid()) {
  echo '<p>Captcha valid!</p>';
} else {
  echo '<p>Captcha invalid!</p>';
}
?>
```

**Make sure to update all the paths / URLs to `generate-captcha.php`, `verify-captcha.php` and `functions.php`**
