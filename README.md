# Yii2.x Open Graph
[![Build Status](https://travis-ci.org/vumanskyi/yii2-opengraph.svg?branch=master)](https://travis-ci.org/vumanskyi/yii2-opengraph)
[![StyleCI](https://github.styleci.io/repos/119894207/shield?branch=master)](https://github.styleci.io/repos/119894207)
[![Total Downloads](https://img.shields.io/packagist/dt/umanskyi31/opengraph.svg?style=flat-square)](https://packagist.org/packages/umanskyi31/opengraph)
[![Coverage Status](https://coveralls.io/repos/github/vumanskyi/yii2-opengraph/badge.svg)](https://coveralls.io/github/vumanskyi/yii2-opengraph)

Create implementation for Yii2. Generate Open Graph protocol for your website.

### Installation

```
composer require umanskyi31/opengraph
```

or add 

```
"umanskyi31/opengraph": "*"
```

to the require section of your composer.json file.

### Configuration

```php
   'components' => [
       'opengraph' => [
           'class' => 'umanskyi31\opengraph\OpenGraph',
       ],
       // ...
   ]
```

### Usage

You must add component to controller before rendering view.

Example:

```php
     /**
      * @var OpenGraph $openGraph
      */
      $openGraph = Yii::$app->opengraph;
```



#### How to use

Add basic attributes:

```php
     /**
      * @var OpenGraph $openGraph
      */
      $openGraph = Yii::$app->opengraph;
      
      $openGraph->getBasic()
            ->setUrl('https://umanskyi.com') 
            ->setTitle('My_Article_Title')
            ->setDescription('My_Article_Description)
            ->setSiteName('My_Site_Name')
            ->setLocale('pl_PL')
            ->setLocalAlternate(['fr_FR', 'en_US'])
            ->render();
```
