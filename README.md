# Video OEmbed
[![Build Status](https://api.travis-ci.org/ricardofiorani/video-oembed.svg?branch=master)](http://travis-ci.org/ricardofiorani/video-oembed)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.4-8892BF.svg)](https://php.net/)
[![License](https://poser.pugx.org/ricardofiorani/video-oembed/license.png)](https://packagist.org/packages/ricardofiorani/video-oembed)
[![Total Downloads](https://poser.pugx.org/ricardofiorani/video-oembed/d/total.png)](https://packagist.org/packages/ricardofiorani/video-oembed)
[![Coding Standards](https://img.shields.io/badge/cs-PSR--4-yellow.svg)](https://github.com/php-fig-rectified/fig-rectified-standards)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ricardofiorani/video-oembed/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ricardofiorani/video-oembed/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/ricardofiorani/video-oembed/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/ricardofiorani/video-oembed/?branch=master)

Video OEmbed is a PHP library to assist you retrieve usual video informations such as embed codes, title, description, thumbnail and other informations from the most well-known video platforms and services.
## Installation

Install the latest version with

```bash
$ composer require ricardofiorani/video-oembed
```

## Requirements

* PHP 7.4
* cURL (Or at least file_get_contents() enabled if you want to use it with Vimeo, otherwise it's not required)

## Basic Usage

```php
<?php
use RicardoFiorani\VideoAdapter\Service\VideoAdapterBuilder;

require __DIR__ . '/vendor/autoload.php';

$builder = new VideoAdapterBuilder();

//Detects which service the url belongs to and returns the service's implementation
//of RicardoFiorani\Adapter\VideoAdapterInterface
$video = $builder->buildFromURL('https://www.youtube.com/watch?v=PkOcm_XaWrw');

//Checks if service provides embeddable videos (most services does)
if ($video->isEmbeddable()) {
    //Will echo the embed html element with the size 200x200
    echo $video->getEmbedCode(200, 200);

    //Returns the embed html element with the size 1920x1080 and autoplay enabled
    echo $video->getEmbedCode(1920, 1080, true);
    
    //Returns the embed html element with the size 1920x1080, autoplay enabled and force the URL schema to be https.
    echo $video->getEmbedCode(1920, 1080, true, true);
}

//If you don't want to check if service provides embeddable videos you can try/catch
try {
    echo $video->getEmbedUrl();
} catch (\RicardoFiorani\Exception\NotEmbeddableException $e) {
    die(sprintf("The URL %s service does not provide embeddable videos.", $video->getRawUrl()));
}

//Gets URL of the smallest thumbnail size available
echo $video->getSmallThumbnail();

//Gets URL of the largest thumbnail size available
//Note some services (such as Youtube) does not provide the largest thumbnail for some low quality videos (like the one used in this example)
echo $video->getLargestThumbnail();
```

## Registering your own service video (it's easy !)
If you want to register an implementation of some service your class just needs to implement the "RicardoFiorani\Adapter\VideoAdapterInterface" or extend the RicardoFiorani\Adapter\AbstractServiceAdapter

A Fully functional example can be found [Here](https://github.com/ricardofiorani/video-oembed/tree/master/documentation/RegisteringANewService.md).

PS: If you've made your awesome implementation of some well known service, feel free to send a Pull Request. All contributions are welcome :)

## Using your own framework's template engine
A Fully functional example can be found [Here](https://github.com/ricardofiorani/video-oembed/tree/master/documentation/IntegratingYourOwnRenderer.md).


## Currently Suported Services
* Youtube
* Vimeo
* Dailymotion
* Facebook Videos

## Currently Supported PHP Versions
* PHP 7.4
