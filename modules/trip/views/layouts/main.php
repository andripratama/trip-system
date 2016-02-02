<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Menu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
			['label' => 'Create Trip', 'url' => ['/trip/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ?
				['label' => 'Sign in', 'url' => ['/user/security/login']] :
				[
					'label' => 'Hi, (' . Yii::$app->user->identity->username . ')',
					'items'=>[
						[
							'label' => 'Acount',
							'url' => ['/user/settings/account'],
						],
						[
							'label' => 'Profile',
							'url' => ['/user/settings/profile'],
						],
						[
							'label' => 'Network',
							'url' => ['/user/settings/networks'],
						],
						[
							'label' => 'Sign out (' . Yii::$app->user->identity->username . ')',
							'url' => ['/user/security/logout'],
							'linkOptions' => ['data-method' => 'post']
						]
					]
				],
			['label' => 'Register', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest]
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
		
		<div id="trip menu" class="row">
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						Event Menu        
					</div>
					<div class="panel-body">
						<?= Menu::widget([
							'options' => [
								'class' => 'nav nav-pills nav-stacked',
							],
							'items' => [
								['label' => Yii::t('app', 'Dashboard'), 'url' => ['/dashboard']],
								['label' => Yii::t('app', 'My Event'), 'url' => ['/my-event']],
							],
						]) ?>
					</div>
				</div>
			</div>
			<div id="trip content" class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						Event Create          
					</div>
					<div class="panel-body">
						<?= $content ?>
					</div>
				</div>
			</div>
		</div>
        
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
