# Yii2.x Open Graph

[![StyleCI](https://github.styleci.io/repos/119894207/shield?branch=master)](https://github.styleci.io/repos/119894207)
[![Total Downloads](https://poser.pugx.org/umanskyi31/opengraph/downloads)](https://packagist.org/packages/umanskyi31/opengraph)

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

```
   'components' => [
       'opengraph' => [
           'class' => 'umanskyi31\opengraph\OpenGraph',
       ],
       // ...
   ]
```

### Usage

You must add component to controller before rendering view.



#### Use like object
Component contain objects: ['title','type','url','image','description','audio','locale','site_name','video','audio','music']

```
Yii::$app->opengraph->title = 'My_Article_Title';
Yii::$app->opengraph->description = 'My_Article_Description';
Yii::$app->opengraph->image = 'https://my_article_image.png';
Yii::$app->opengraph->video = 'http://example.com/bond/trailer.swf';
//etc...

```  

or like function

```
Yii::$app->opengraph->title('My_Article_Title');
Yii::$app->opengraph->description('My_Article_Description');
Yii::$app->opengraph->image('https://my_article_image.png');
Yii::$app->opengraph->video('http://example.com/bond/trailer.swf');
//etc...

``` 
#### Use like array

Only like array, we can create component like **twitter card**

Example:

if use default og
```
Yii::$app->opengraph->optMetaData([
            'title' => 'My_Article_Title',
            'description' => 'My_Article_Description'
            //etc..
        ])
```

or own properties 

```
Yii::$app->opengraph->optMetaData([
            'twitter:card' => 'summary',
            'twitter:site' => 'https://example.com/'
            //and you can use like that 
            'og:title' => 'My_Article_Title'
            //etc..
  ], true)
  
```
