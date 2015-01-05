Laravel 5 Facebook PHP SDK 4 wrapper
===================================

Extension of PHP SDK 4 for Laravel's custom session handling in L5.

INSTALLATION
===================================

1. Get the repository files.
2. Go to your project folder and open up composer.json with your favorite editor
3. Find the "autoload" part, where you can see PSR-4 if using Laravel 5. Add the new namespace: `"RapliAndras\\Facebook" : "vendor/rapliandras/facebook"`
4. Find the file `FacebookLoginRedirectHelper.php` and copy it to `vendor/rapliandras/facebook/laravel`. This is the only file in this package by the way :) It is responsible for a server side login to Facebook.
5. Generate new classpaths with `composer dump-autoload -o`. The param `-o` is for optimized.
6. Find the file `FacebookController.php` and copy it to your `app/Http/Controllers` folder.
7. Set up a route for the method `FacebookController@login` to check the result.
8. Enjoy.

LICENSE
====================================
MIT license.
Andras Rapli, 
http://rapliandras.hu
