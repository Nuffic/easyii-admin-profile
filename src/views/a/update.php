<?php
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Update profile: ' . $admin->username;
/** @var \yii\web\View $this */
?>

<?= $this->render('_form', ['admin' => $admin]);