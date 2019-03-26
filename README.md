# Yii2.x Open Graph
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



#### Usage like as object
Component contain objects: ['title','type','url','image','description','audio','locale','site_name','video','audio','music']

```
Yii::$app->opengraph->title = 'My_Article_Title';
Yii::$app->opengraph->description = 'My_Article_Description';
Yii::$app->opengraph->image = 'https://my_article_image.png';
Yii::$app->opengraph->video = 'http://example.com/bond/trailer.swf';
//etc...

```  

or like as function

```
Yii::$app->opengraph->title('My_Article_Title');
Yii::$app->opengraph->description('My_Article_Description');
Yii::$app->opengraph->image('https://my_article_image.png');
Yii::$app->opengraph->video('http://example.com/bond/trailer.swf');
//etc...

``` 
#### Usage as array

Only like array, we can create component like as twitter card

Example:

if using default og
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