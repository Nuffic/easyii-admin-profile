<?php
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Profiles';
/** @var \yii\web\View $this */
?>

    <p>
        <?= Html::a('Add admin', ['/admin/admins/create'], ['class' => 'btn btn-success']) ?>
    </p>

<?= GridView::widget([
    'dataProvider' => $admins,
    'columns' => [
        'username' => [
            'attribute' => 'username',
            'value' => function ($model) {
                return Html::a($model->username, ['update', 'id' => $model->primaryKey]);
            },
            'format' => 'html',
        ],
        'first_name',
        'last_name',
        'email'
    ]
]);
