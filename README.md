# Yii2.x Open Graph
[![Build Status](https://travis-ci.org/vumanskyi/yii2-opengraph.svg?branch=master)](https://travis-ci.org/vumanskyi/yii2-opengraph)
[![StyleCI](https://github.styleci.io/repos/119894207/shield?branch=master)](https://github.styleci.io/repos/119894207)
[![Total Downloads](https://img.shields.io/packagist/dt/umanskyi31/opengraph.svg?style=flat-square)](https://packagist.org/packages/umanskyi31/opengraph)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/vumanskyi/yii2-opengraph/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/vumanskyi/yii2-opengraph/?branch=master)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)

Created a new component for Yii2. The Open Graph component for your website

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

You should add component to controller before rendering view.

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


Add image attributes:

```php
/**
 * @var OpenGraph $openGraph
 */
 $openGraph = Yii::$app->opengraph;
 
 $openGraph->getImage()
       ->setUrl('https://umanskyi.com/logo.png')
       ->setAttributes([
           'secure_url' => 'https://umanskyi.com/logo.png',
           'width'      => 100,
           'height'     => 100,
           'alt'        => "Logo",
       ])
       ->render();
```

If necessary, an array of images also possible to add the next code:

```php
/**
 * @var OpenGraph $openGraph
 */
 $openGraph = Yii::$app->opengraph;
 
 $openGraph->getImage()
       ->setUrl('https://umanskyi.com/logo.png')
       ->setAttributes([
           'secure_url' => 'https://umanskyi.com/logo.png',
           'width'      => 100,
           'height'     => 100,
           'alt'        => "Logo",
       ])
       ->render();     
 
 $openGraph->getImage()
       ->setUrl('https://umanskyi.com/small_logo.png')
       ->setAttributes([
           'secure_url' => 'https://umanskyi.com/small_logo.png',
           'width'      => 50,
           'height'     => 50,
           'alt'        => "small logo",
       ])
       ->render();
       
```

Add article attribute:

```php
       
            
```


Add audio attribute:

```php
       
            
```



Add book attribute:

```php
       
            
```



Add music attribute:

```php
       
            
```



Add profile attribute:

```php
/**
 * @var OpenGraph $openGraph
 */
 $openGraph = Yii::$app->opengraph;
    
 $openGraph->getProfile()
      ->setGender('Male')
      ->setFirstName('Vlad')
      ->setLastName('Umanskyi')
      ->setUsername('vlad.umanskyi')
      ->render();   
            
```



Add video attribute:

```php
       
            
```

In current version also has the configuration **Twitter Card**

```php
/**
 * @var OpenGraph $openGraph
 */
 $openGraph = Yii::$app->opengraph;
        
 $openGraph->useTwitterCard()
    ->setCard('summary')
    ->setSite('https://umanskyi.com')
    ->setCreator('Vlad Umanskyi')
    ->render();
```  