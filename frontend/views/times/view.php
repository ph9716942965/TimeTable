<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Times */
?>
<div class="times-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'time_from',
            'time_to',
        ],
    ]) ?>

</div>
