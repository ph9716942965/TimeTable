<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model frontend\models\HolidayDate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="holiday-date-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'language' => 'en',
			'dateFormat' => 'yyyy-MM-dd',
            ]
        ]) ?>
    <?php // $form->field($model, 'date')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
