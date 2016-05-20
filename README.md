Range compression-decomression
==============================
Strictly increasing sequences arrays compressing tool. For example: {1,2,3,4,5}=>{"1-5"}

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist stivehu/yii2-rangecomp "*"
```

or add

```
"stivehu/yii2-rangecomp": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \stivehu\rangecomp\Rangecomp::rangeDeCompress([1,2,"4-10"]); ?>
<?= \stivehu\rangecomp\Rangecomp::rangeCompress([1,2,4,5,6,7,8,9,10"]); ?>```

js version:
```php
<?php \rangecomp\Rangecomp::rangeDeCompress(Json::decode($this->getBigCookie($this->cookieName))) ?>
```
```js
rangeDeCompress([1,2,3,"4-10"]);
rangeCompress([ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ]);
```