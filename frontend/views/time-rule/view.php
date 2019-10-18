<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TimeRule */
?>
<div class="time-rule-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'day_id',
            'time_id:datetime',
        ],
    ]) ?>

</div>
