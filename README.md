# OEmbed
[![Build Status](https://api.travis-ci.org/ricardofiorani/oembed.svg?branch=master)](http://travis-ci.org/ricardofiorani/oembed)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.4-8892BF.svg)](https://php.net/)
[![License](https://poser.pugx.org/ricardofiorani/oembed/license.png)](https://packagist.org/packages/ricardofiorani/oembed)
[![Total Downloads](https://poser.pugx.org/ricardofiorani/oembed/d/total.png)](https://packagist.org/packages/ricardofiorani/oembed)
[![Coding Standards](https://img.shields.io/badge/cs-PSR--4-yellow.svg)](https://github.com/php-fig-rectified/fig-rectified-standards)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ricardofiorani/oembed/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ricardofiorani/oembed/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/ricardofiorani/oembed/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/ricardofiorani/oembed/?branch=master)

OEmbed is a PHP library to assist you retrieving data from providers that supports OEmbed.  
It was built to be a successor of `ricardofiorani/php-video-url-parser`.

## Installation

Install the latest version with

```bash
$ composer require ricardofiorani/oembed
```

## Requirements
* PHP 7.4
* A PSR-18 implementation
* A PSR-17 implementation of `RequestFactory` and `UriFactory` 

## Basic Usage
```php
<?php declare(strict_types=1);

use Your\PSR7Implementation\Uri;
use RicardoFiorani\OEmbed\OEmbed;

require __DIR__ . '/vendor/autoload.php';

$service = new OEmbed();

$uri = new Uri('https://www.facebook.com/FacebookDeutschland/videos/2403439749688130/');

$result = $service->get(
    $uri,
    480,
    300,
    ['omitscript' => true]
);

echo (string)$result; //will render the HTML (in case of "video" or "rich") or URL (in case of "photo")
```

## Services supported (and tested)
- Dailymotion
- Deviantart
- Facebook
- Gfycat
- Giphy
- Instagram
- Kickstarter
- Meetup
- Me.me
- Reddit
- Soundcloud
- Spotify
- Twitch
- Twitter
- Vimeo
- Youtube
   
## Services supported but not tested
All the rest on https://oembed.com/providers.json


## Currently Supported PHP Versions
* PHP 7.4
