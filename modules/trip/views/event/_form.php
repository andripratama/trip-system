<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\trip\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">
		<div class="col-md-12">
			<?= $form->field($model, 'title')->textInput([
				'class'=>'form-control input-lg'
			]) ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">

			<div class="row">
				<div class="col-md-6 offset-2">
					<?php
            echo '<label class="control-label">Tanggal Mulai</label>';
            echo DatePicker::widget([
              'model' => $model,
              'attribute' => 'start_date',
              'size' => 'md',
              'pluginOptions' => [
                'startDate' => date('d-m-Y h:i:s'),
                'autoclose'=>true,
                'format' => 'dd/mm/yyyy'
              ]
            ]);
					?>
				</div>
				<div class="col-md-4 ">
					<?php
              echo '<label>Waktu Mulai</label>';
              echo TimePicker::widget([
                'model' => $model,
                'attribute' => 'start_time',
                'value' => '',
                'pluginOptions' => [
                  'showSeconds' => true,
                  'defaultTime' => false,
                ]
              ]);
          ?>
				</div>
			</div>

		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6 offset-2">
					<?php
            echo '<label class="control-label">Tanggal Berakhir</label>';
            echo DatePicker::widget([
              'model' => $model,
              'attribute' => 'end_date',
              'size' => 'md',
              'pluginOptions' => [
                'startDate' => date('d-m-Y h:i:s'),
                'autoclose'=>true,
                'format' => 'dd/mm/yyyy'
              ]
            ]);
					?>

				</div>
				<div class="col-md-4">
          <?php
              echo '<label>Waktu Berakhir</label>';
              echo TimePicker::widget([
                'model' => $model,
                'attribute' => 'end_time',
                'value' => '',
                'pluginOptions' => [
                  'showSeconds' => true,
                  'defaultTime' => false,
                ]
              ]);
          ?>
				</div>
			</div>
		</div>
	</div>

  <div class="row">
		<div class="col-md-12">
			<?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
      <?= $form->field($model, 'description')->widget(\yii\redactor\widgets\Redactor::className(), [
          'clientOptions' => [
              'lang' => 'EN_EN',
              'plugins' => ['clips', 'fontcolor','imagemanager']
            ]
      ])?>
		</div>
	</div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
