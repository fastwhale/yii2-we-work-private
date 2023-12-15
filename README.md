Yii2-we-work-private
============

Yii2 private wechat work SDK

[![Latest Stable Version](https://poser.pugx.org/fastwhale/yii2-we-work-private/v/stable.png)](https://packagist.org/packages/fastwhale/yii2-we-work-private)
[![Total Downloads](https://poser.pugx.org/fastwhale/yii2-we-work-private/downloads.png)](https://packagist.org/packages/fastwhale/yii2-we-work-private)
[![License](http://poser.pugx.org/fastwhale/yii2-we-work-private/license)](https://packagist.org/packages/fastwhale/yii2-we-work-private)
[![PHP Version Require](http://poser.pugx.org/fastwhale/yii2-we-work-private/require/php)](https://packagist.org/packages/fastwhale/yii2-we-work-private)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist fastwhale/yii2-we-work-private "*"
```

or add

```
"fastwhale/yii2-we-work-private": "*"
```

to the require section of your `composer.json` file.

Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
/** @var Work $workApi */
$workApi = \Yii::createObject([
    'class'             => Work::className(),
    'corpid'            => $corpid,
    'secret'            => $secret,
    'privatizedBaseUrl' => 'https://privateHost',
]);

/** @var Work $agentApi */
$agentApi = \Yii::createObject([
    'class'             => Work::className(),
    'corpid'            => $corpid,
    'secret'            => $agentSecret,
    'privatizedBaseUrl' => 'https://privateHost',
]);

/** @var ServiceWork $serviceWork */
$serviceWork = \Yii::createObject([
    'class'             => ServiceWork::className(),
    'suite_id'          => $suiteId,
    'suite_secret'      => $suiteSecret,
    'suite_ticket'      => $suiteTicket,
    'auth_corpid'       => $authCorpid,
    'permanent_code'    => $permanentCode,
    'privatizedBaseUrl' => 'https://privateHost',
]);

/** @var ServiceProvider $serviceProvider */
$serviceProvider = \Yii::createObject([
    'class'             => ServiceProvider::className(),
    'provider_corpid'   => $providerCorpid,
    'provider_secret'   => $providerSecret,
    'privatizedBaseUrl' => 'https://privateHost',
]);
```
