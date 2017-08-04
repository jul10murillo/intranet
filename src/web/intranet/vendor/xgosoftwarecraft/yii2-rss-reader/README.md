# yii2-rss-reader
Rss reader widget for Yii2. 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist xgosoftwarecraft/yii2-rss-reader "dev-master"
```

or add

```
"xgosoftwarecraft/yii2-rss-reader": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----


```php
$sources = ['http://feed/' => 'Author', 'http://feed/' => 'Author'];
new xgosoftwarecraft\RssFeed\RssReader()->read($sources);
```