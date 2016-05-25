<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$module = $this->context->module->id;

/** @var \nuffic\profile\models\Admin $admin */

$form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data', 'class' => 'model-form']
]);
?>

<?= $form->field($admin, 'first_name') ?>

<?= $form->field($admin, 'last_name') ?>

<?= $form->field($admin, 'email') ?>

<?php
if (!empty($admin->picture)) {
    echo Html::img($admin->getThumbUploadUrl('picture', 'admin_form'), ['class' => 'img-thumbnail']);
}
?>

<?= $form->field($admin, 'picture')->fileInput([
    'value' => \yii\helpers\ArrayHelper::getValue($admin, 'picture')
]) ?>

<?= Html::submitButton(Yii::t('easyii', 'Save'), ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end();