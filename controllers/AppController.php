<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use GuzzleHttp\Client;
use yii\helpers\Url;

class AppController extends Controller
{
    public function getWeatherContent($url){
        $client = new Client();
        $res = $client->request('GET', $url);
        $bodyWeather = $res->getBody();
        $getDoc = \phpQuery::newDocumentHTML($bodyWeather);
        $getContent = $getDoc->find(".content");
        return $getContent;
    }
}