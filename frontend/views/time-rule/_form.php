<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TimeRule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="time-rule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'day_id')->textInput() ?>

    <?= $form->field($model, 'time_id')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
