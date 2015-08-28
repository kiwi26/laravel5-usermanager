# kiwi/lavarel5-usermanager

[![Software License][ico-license]](LICENSE.md)

This package helps you to start a project with all routes, controllers and views for users management (registration, profile, password edit/reset, login, logout)

## Install

Via Composer

``` bash
$ composer require kiwi/lavarel5-usermanager
```

## Config

App Provider

``` php

'providers' => [
	...,
    Kiwi\UserManager\UserManagerServiceProvider::class
],
'aliases' => [
	...
	'UserManager' => Kiwi\UserManager\Facades\UserManager::class
]
```

Publish views / config / translations

``` bash
php artisan vendor:publish
```

Env - If NoCaptcha ReCaptcha is enabled

``` bash
NOCAPTCHA_SECRET=[YOUR_SECRET_KEY]
NOCAPTCHA_SITEKEY=[YOUR_SITEKEY]
```

Conf file

``` html
/config/kiwi/usermanager.php
```
## Usage

Helpers

``` php
UserManager::getProfileFormView()
UserManager::getRegisterFormView()
UserManager::getLoginFormView()
UserManager::getEditPasswordFormView()
UserManager::getResetPasswordMailFormView()
UserManager::getResetPasswordResetFormView()
UserManager::isNoCaptchaActive()
```

Routes

``` html

As a known user

	user/password @POST,GET
	user/profile @POST, GET
	user/logout @GET

As a guest

	user/login @POST
	user/register @POST
	password/email @GET, POST
	password/reset @POST
	password/reset/{token} @GET
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security

If you discover any security related issues, please email contact@kevin-anidjar.com  instead of using the issue tracker.

## Credits

- [Kevin Anidjar][http://www.kevin-anidjar.com]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/league/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/thephpleague/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/thephpleague/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/thephpleague/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/league/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/league/:package_name
[link-travis]: https://travis-ci.org/thephpleague/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/thephpleague/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/thephpleague/:package_name
[link-downloads]: https://packagist.org/packages/league/:package_name
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors