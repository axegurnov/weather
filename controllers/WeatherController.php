<?php

namespace app\controllers;

use app\models\Today;
use app\models\Week;
use Yii;
use GuzzleHttp\Client;
use yii\helpers\Url;
use yii\web\View;

class WeatherController extends AppController
{
    /**
     * Displays weather
     *
     * @return string
     */
    public function actionIndex()
    {
        $getContent = $this->getWeatherContent('https://yandex.ru/pogoda/moscow/details');
        foreach ($getContent as $weather) {
            $pq = pq($weather);
            $dayTodayWeather = $pq->find("dt")->attr('data-anchor');
            $mouthTodayWeather = $pq->find("small span");
        }
        foreach ($mouthTodayWeather as $month) {
            $pqMouth = pq($month);
            $thisMonth[] = $pqMouth->html();
        }
        $mouthTodayWeather = $thisMonth[0];
        //
        $tempToday = $getContent->find('.temp__value');
        foreach ($tempToday as $today) {
            $pqMouth = pq($today);
            $tmpToday[] = $pqMouth->html();
        }
        $update = Today::findOne(1);
        $update->morning = $tmpToday[0].$tmpToday[1];
        $update->day = $tmpToday[3].$tmpToday[4];
        $update->evening = $tmpToday[6].$tmpToday[7];
        $update->night = $tmpToday[9].$tmpToday[10];
        $update->save();
        $this->view->title='Погода на сегодня';
        return $this->render('index', compact('dayTodayWeather', 'mouthTodayWeather', 'tmpToday'));
    }

    /**
     * Displays weather week.
     *
     * @return string
     */
    public function actionWeek()
    {
        $getContent = $this->getWeatherContent('https://yandex.ru/pogoda/moscow/details');
        $getDate = $getContent->find('dt');
        foreach ($getDate as $date) {
            $pq = pq($date);
            $dayTodayWeather[] = $pq->attr('data-anchor');
        }
        ////
        $mouthTodayWeather = $getContent->find('.forecast-details__weekday span');
        foreach ($mouthTodayWeather as $month) {
            $pqMouth = pq($month);
            $mouthWeather[] = $pqMouth->html();
        }
        ////
        $tempToday = $getContent->find('.temp__value');
        foreach ($tempToday as $today) {
            $pqMouth = pq($today);
            $tmpToday[] = $pqMouth->html();
        }
        $update = Week::findOne(1);
        $update->morning = $tmpToday[0].$tmpToday[1];
        $update->day = $tmpToday[3].$tmpToday[4];
        $update->evening = $tmpToday[6].$tmpToday[7];
        $update->night = $tmpToday[9].$tmpToday[10];
        $update->save();
        $update2 = Week::findOne(2);
        $update2->morning = $tmpToday[12].$tmpToday[13];
        $update2->day = $tmpToday[15].$tmpToday[16];
        $update2->evening = $tmpToday[18].$tmpToday[19];
        $update2->night = $tmpToday[21].$tmpToday[22];
        $update2->save();
        $update3 = Week::findOne(3);
        $update3->morning = $tmpToday[24].$tmpToday[25];
        $update3->day = $tmpToday[27].$tmpToday[28];
        $update3->evening = $tmpToday[30].$tmpToday[31];
        $update3->night = $tmpToday[33].$tmpToday[34];
        $update3->save();
        $update4 = Week::findOne(4);
        $update4->morning = $tmpToday[36].$tmpToday[37];
        $update4->day = $tmpToday[39].$tmpToday[40];
        $update4->evening = $tmpToday[42].$tmpToday[44];
        $update4->night = $tmpToday[46].$tmpToday[47];
        $update4->save();
        $update5 = Week::findOne(5);
        $update5->morning = $tmpToday[49].$tmpToday[50];
        $update5->day = $tmpToday[51].$tmpToday[52];
        $update5->evening = $tmpToday[53].$tmpToday[54];
        $update5->night = $tmpToday[56].$tmpToday[57];
        $update5->save();
        $update6 = Week::findOne(6);
        $update6->morning = $tmpToday[59].$tmpToday[60];
        $update6->day = $tmpToday[62].$tmpToday[63];
        $update6->evening = $tmpToday[65].$tmpToday[66];
        $update6->night = $tmpToday[67].$tmpToday[68];
        $update6->save();
        $update7 = Week::findOne(7);
        $update7->morning = $tmpToday[70].$tmpToday[71];
        $update7->day = $tmpToday[73].$tmpToday[74];
        $update7->evening = $tmpToday[76].$tmpToday[77];
        $update7->night = $tmpToday[78].$tmpToday[79];
        $update7->save();
        $update8 = Week::findOne(8);
        $update8->morning = $tmpToday[81].$tmpToday[82];
        $update8->day = $tmpToday[84].$tmpToday[85];
        $update8->evening = $tmpToday[87].$tmpToday[88];
        $update8->night = $tmpToday[89].$tmpToday[90];
        $update8->save();
        $update9 = Week::findOne(9);
        $update9->morning = $tmpToday[91].$tmpToday[92];
        $update9->day = $tmpToday[93].$tmpToday[94];
        $update9->evening = $tmpToday[96].$tmpToday[997];
        $update9->night = $tmpToday[99].$tmpToday[100];
        $update9->save();
        $update10 = Week::findOne(10);
        $update10->morning = $tmpToday[102].$tmpToday[104];
        $update10->day = $tmpToday[103].$tmpToday[104];
        $update10->evening = $tmpToday[106].$tmpToday[107];
        $update10->night = $tmpToday[109].$tmpToday[110];
        $update10->save();
        $this->view->title='Погода на неделю';
        return $this->render('week',compact('dayTodayWeather','mouthWeather','tmpToday'));
    }
}
