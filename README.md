# OEmbed
[![Build Status](https://api.travis-ci.org/ricardofiorani/oembed.svg?branch=master)](http://travis-ci.org/ricardofiorani/oembed)
[![Minimum PHP Version](https://img.shields.io/packagist/php-v/ricardofiorani/php-legofy.svg)](https://php.net/)
[![License](https://poser.pugx.org/ricardofiorani/oembed/license.png)](https://packagist.org/packages/ricardofiorani/oembed)
[![Total Downloads](https://poser.pugx.org/ricardofiorani/oembed/d/total.png)](https://packagist.org/packages/ricardofiorani/oembed)
[![Coding Standards](https://img.shields.io/badge/cs-PSR--4-yellow.svg)](https://github.com/php-fig-rectified/fig-rectified-standards)

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

$uri = new Uri('https://www.dailymotion.com/video/x804zfb?playlist=x6ymns');

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
- Deviantart.com
- Facebook*
- Gfycat
- Giphy
- Instagram*
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

> *Facebook and Instagram requires authentication  
> Please see https://developers.facebook.com/docs/instagram/oembed  
> Also please see the example at the bottom of this doc 
## Services supported but not tested
- 23HQ
- Abraia
- Adways
- Alpha App Net
- Altru
- amCharts Live Editor
- Animatron
- Animoto
- Apester
- ArcGIS StoryMaps
- Archivos
- Audioboom
- AudioClip
- Audiomack
- AudioSnaps
- Avocode
- AxiomNinja
- Backtracks
- Beautiful.AI
- Blackfire.io
- Blogcast
- Box Office Buz
- BrioVR
- Buttondown
- Byzart Project
- Cacoo
- Carbon Health
- CatBoat
- Ceros
- ChartBlocks
- chirbit.com
- CircuitLab
- Clipland
- Clyp
- CoCo Corp
- CodeHS
- Codepen
- Codepoints
- CodeSandbox
- CollegeHumor
- Commaful
- Coub
- Crowd Ranking
- Cyrano Systems
- Daily Mile
- Datawrapper
- Deseret News
- Didacte
- Digiteka
- Dipity
- DocDroid
- Dotsub
- DTube
- edocr
- eduMedia
- EgliseInfo
- Embed Articles
- Embedery
- Embedly
- Ethfiddle
- Eyrie
- Fader
- Faithlife TV
- Firework
- FITE
- Flat
- Flickr
- Flourish
- Fontself
- FOX SPORTS Australia
- FrameBuzz
- FunnyOrDie
- Geograph Britain and Ireland
- Geograph Channel Islands
- Geograph Germany
- Getty Images
- Gifnote
- GloriaTV
- GT Channel
- Gyazo
- hearthis.at
- hihaho
- Homey
- HuffDuffer
- Hulu
- iFixit
- IFTTT
- iHeartRadio
- Indaco
- Infogram
- Infoveave
- Injurymap
- Inoreader
- inphood
- iSnare Articles
- Issuu
- ivlismusic
- Jovian
- KakaoTv
- Kidoju
- Kirim.Email
- Kit
- Kitchenbowl
- Knacki
- Knowledge Pad
- LearningApps.org
- Lille.Pod
- Livestream
- Ludus
- MathEmbed
- Matterport
- MediaLab
- Medienarchiv der Künste - Zürcher Hochschule der Künste
- Mermaid Ink
- Microlink
- Microsoft Stream
- MixCloud
- Moby Picture
- Modelo
- MorphCast
- Music Box Maniacs
- myBeweeg
- Namchey
- nanoo.tv
- Nasjonalbiblioteket
- Natural Atlas
- nfb.ca
- Odds.com.au
- Odesli (formerly Songlink)
- Official FM
- Omniscope
- On Aol
- Ora TV
- Orbitvu
- Oumy
- Outplayed.tv
- Overflow
- OZ
- Padlet
- Pastery
- PingVP
- Pinpoll
- Pixdor
- Podbean
- Polaris Share
- Poll Daddy
- Port
- Portfolium
- posiXion
- Qualifio
- Quiz.biz
- Quizz.biz
- RadioPublic
- RapidEngage
- ReleaseWire
- Replit
- RepubHub
- ReverbNation
- RiffReporter
- Roomshare
- RoosterTeeth
- Rumble
- Runkit
- Sapo Videos
- Screen9
- Screencast.com
- Screenr
- ScribbleMaps
- Scribd
- SendtoNews
- ShortNote
- Shoudio
- Show the Way, actionable location info
- Simplecast
- Sizzle
- Sketchfab
- SlideShare
- SmashNotes
- SmugMug
- SocialExplorer
- Soundsgood
- SpeakerDeck
- Spotful
- Spreaker
- Stanford Digital Repository
- Streamable
- StreamOneCloud
- Sutori
- Sway
- TED
- The New York Times
- They Said So
- TickCounter
- TikTok
- Toornament
- Topy
- Tuxx
- tvcf
- TypeCast
- Typlog
- Ubideo
- University of Cambridge Map
- UnivParis1.Pod
- UOL
- Ustream
- uStudio, Inc.
- Utposts
- Uttles
- VeeR VR
- Verse
- VEVO
- VideoJug
- Vidlit
- Vidmizer
- Vidyard
- Viously
- Viziosphere
- Vizydrop
- Vlipsy
- VLIVE
- Vlurb
- VoxSnap
- Wave.video
- wecandeo
- Wiredrive
- Wistia, Inc.
- wizer.me
- Wokwi
- Wootled
- WordPress.com
- Xpression
- Yes, I Know IT!
- YFrog
- Zeplin
- ZingSoft
- ZnipeTV
- Zoomable
- Plus all not mentioned available on https://oembed.com/providers.json


## Currently Supported PHP Versions
* PHP 7.4 || PHP 8.0

## Facebook and Instagram requiring authentication
Yeah I know, it sucks having to create an FB app and generate a token.  

Anyway, there is two ways (maybe more but I can only think of two now) of making this lib work with FB and IG.

### Method 1
You make a custom HTTP client (implementing `\Psr\Http\Client\ClientInterface`) and instructs it to retrieve the token following Facebook guidelines.

### Method 2
Easier way, you just send your Application ID and Secret as an extra parameter to the endpoint and that's it.

```php
$service = new OEmbed();

$uri = new Uri('https://www.facebook.com/FacebookDeutschland/videos/2403439749688130/');

$result = $service->get(
    $uri,
    480,
    300,
    ['access_token' => `{$appId}|{$appSecret}`]
);
```