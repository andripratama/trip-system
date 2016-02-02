<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = 'Jalan App';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="<?=Url::toRoute('/create-event')?>">Buat Perjalanan</a></p>
    </div>

    <div class="body-content">
        <!== Event Box ==!>
        <?=$this->render('widget/event-box/main',['event'=>$event]);?>
    </div>
</div>
