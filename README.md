# WordPress Versions 

## About
With this plugin, you will be able to obtain different versions of WordPress using a shortcode.


## Prequis 
You will need (for testing) :
* Download the latest version of WordPress.
* XAMPP installed and set up.


## Get Started

* After installing and setting up XAMPP, go to the htdocs folder and place the version 6.2 that you downloaded into it(don't forget to name the WordPress folder with the name you want).

* In your WordPress folder, navigate to wp-content/plugins/ and place the v-wp plugin folder in it.

* Next, go to wp-admin, then to the plugins section, and activate the plugin.

* And voilà, you're good to go!

## Common usage 


* [wpversion type="latest"]

```php
    //return the latest WP version ex: 6.2
```

* [wpversion type="validate" version="5.1"]

```php
    //return the status of the chosen version ex: outdated
```

* [wpversion type="subversion" version="5.9"]

```php
    //return all the subversion of a major ex:
    //5.9.5
    //5.9.4
    //5.9.3
    //5.9.2
    //5.9.1
    //5.9
```

* [wpversion type="mine"]

```php
    //return the version of the current WP project ex: 6.2
```
