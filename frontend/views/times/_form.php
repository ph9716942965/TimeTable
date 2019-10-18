<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
/* @var $this yii\web\View */
/* @var $model frontend\models\Times */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="times-form">

    <?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'time_from')->widget(TimePicker::classname(), []); ?>

    <?= $form->field($model, 'time_to')->widget(TimePicker::classname(), []); ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
