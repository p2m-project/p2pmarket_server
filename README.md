# p2p Market Server

Built using Laravel

### Tips

##### To enable extensions

When developing locally, make sure you have enabled pgsql drivers in your php.ini file. To find it:

```php
<?php
phpinfo();
?>
```

And search for `loaded configuration file`

##### Tinker tips

To access faker in `php artisan tinker`

```php
$faker = Faker\Factory::create();
```
