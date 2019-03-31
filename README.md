# Yii2.x Open Graph
[![Build Status](https://travis-ci.org/vumanskyi/yii2-opengraph.svg?branch=master)](https://travis-ci.org/vumanskyi/yii2-opengraph)
[![StyleCI](https://github.styleci.io/repos/119894207/shield?branch=master)](https://github.styleci.io/repos/119894207)
[![Total Downloads](https://poser.pugx.org/umanskyi31/opengraph/downloads)](https://packagist.org/packages/umanskyi31/opengraph)
[![Latest Stable Version](https://poser.pugx.org/umanskyi31/opengraph/v/stable)](https://packagist.org/packages/umanskyi31/opengraph)
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
/**
 * @var OpenGraph $openGraph
 */
 $openGraph = Yii::$app->opengraph;
        
 $openGraph->getArticle()
       ->setAuthor(['http://examples.opengraphprotocol.us/profile.html'])
       ->setTag(['Test_TAG'])
       ->setSection('Front page')
       ->setPublishTime(new \DateTime('2010-10-11'))
       ->render();
```


Add audio attribute:

```php
/**
 * @var OpenGraph $openGraph
 */
 $openGraph = Yii::$app->opengraph;

 $openGraph->getAudio()
       ->setAttributes([
         'secure_url' => 'https://umanskyi.com/media/audio/250hz.mp3',
         'type' => 'audio/mpeg'
       ])
       ->setUrl('https://d72cgtgi6hvvl.cloudfront.net/media/audio/250hz.mp3')
       ->render();
```



Add book attribute:

```php
/**
 * @var OpenGraph $openGraph
 */
 $openGraph = Yii::$app->opengraph;
 
 $openGraph->getBook()
      ->setReleaseDate(new \DateTime('2011-10-10'))
      ->setTag(['Apple', 'New'])
      ->setAuthor(['http://umanskyi.com/profile.html'])
      ->setIsbn(1451648537)
      ->render();
```



Add music attribute:

```php
/**
 * @var OpenGraph $openGraph
 */
 $openGraph = Yii::$app->opengraph;
 
 $openGraph->getMusic()
      ->setReleaseDate(new \DateTime('2016-01-16'))
      ->setDuration(236)
      ->setAttrAlbum([
          'album:track' => 2
      ])
      ->setMusician([
          'http://open.spotify.com/artist/1dfeR4HaWDbWqFHLkxsg1d',
          'http://open.spotify.com/artist/1dfeR4HaWDbWqFirlsag1d'
      ])
      ->render();
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
/**
 * @var OpenGraph $openGraph
 */
 $openGraph = Yii::$app->opengraph;
 
 $openGraph->getVideo()
      ->setUrl('https://umanskyi.com/strobe/FlashMediaPlayback.swf')
      ->setAttributes([
          'width' => 450,
          'height' => 350,
          'secure_url' => 'https://umanskyi.com/strobe/FlashMediaPlayback.swf',
          'type' => 'application/x-shockwave-flash'
      ])
      ->setAdditionalAttributes([
          'tag' => 'train',
          'release_date' => '1980-10-02'
      ])
      ->render();
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