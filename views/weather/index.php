<?php

/* @var $this yii\web\View */

?>
<div class="site-index">
    <div>
        <h1>Сегодня: <?php echo $dayTodayWeather.' '.$mouthTodayWeather?></h1>
        <p class="p">
        <table class="table" width="200px">
            <tr>
                <td>Утром</td>
            </tr>
            <tr>
                <td><? echo $tmpToday[0].'...'.$tmpToday[1]?></td>
            </tr>
            <tr>
                <td>Днём</td>
            </tr>
            <tr>
                <td><? echo $tmpToday[3].'...'.$tmpToday[4]?></td>
            </tr>
            <tr>
                <td>Вечером</td>
            </tr>
            <tr>
                <td><? echo $tmpToday[6].'...'.$tmpToday[7]?></td>
            </tr>
            <tr>
                <td>Ночью</td>
            </tr>
            <tr>
                <td><? echo $tmpToday[9].'...'.$tmpToday[10]?></td>
            </tr>
        </table>
        </p>
    </div>
</div>
