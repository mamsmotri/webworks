<?php
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;
use webvimark\modules\UserManagement\models\User;
use yii\bootstrap\Button;
use yii\helpers\Url;
use yii\helpers\Html;

if (Yii::$app->user->identity->hasRole('Admin') || 
    Yii::$app->user->identity->hasRole('Driver') ||
    Yii::$app->user->identity->hasRole('Master'))
    echo GhostMenu::widget([
        'encodeLabels'=>false,
        'activateParents'=>true,
        'items' => [
            [
                'label' => 'Backend routes',
                'items'=>UserManagementModule::menuItems()
            ],
            [
                'label' => 'Frontend routes',
                'items'=>[
                    //['label'=>'Login', 'url'=>['/user-management/auth/login']],
                    ['label'=>'Logout', 'url'=>['/user-management/auth/logout']],
                    //['label'=>'Registration', 'url'=>['/user-management/auth/registration']],
                    ['label'=>'Change own password', 'url'=>['/user-management/auth/change-own-password']],
                    ['label'=>'Password recovery', 'url'=>['/user-management/auth/password-recovery']],
                    ['label'=>'E-mail confirmation', 'url'=>['/user-management/auth/confirm-email']],
                ],
            ],
        ],
    ]);
else 
{
    echo '<div class="jumbotron ">';
        echo '<h3>Вы здесь впервые. Определите себя к одному из двух классов</h3>';
            echo Html::a('Я водитель', ['/site/driver'], ['class'=>'btn btn-primary']);
            echo Html::a('Я мастер', ['/site/master'], ['class'=>'btn btn-primary']);
    echo '</div>';
}