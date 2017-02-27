<?php
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;
use webvimark\modules\UserManagement\models\User;
use yii\bootstrap\Button;
use yii\helpers\Url;
use yii\helpers\Html;

if (Yii::$app->user->identity->hasRole('Admin')) {
    echo GhostMenu::widget([
        'encodeLabels'=>false,
        'activateParents'=>true,
        'items' => [
            [
                'label' => 'Backend routes',
                'items'=>UserManagementModule::menuItems()
            ],
            [
                'label' => 'Действия',
                'items'=>[
                    //['label'=>'Login', 'url'=>['/user-management/auth/login']],
                    ['label'=>'Выйти', 'url'=>['/user-management/auth/logout']],
                    //['label'=>'Registration', 'url'=>['/user-management/auth/registration']],
                    ['label'=>'Сменить пароль', 'url'=>['/user-management/auth/change-own-password']],
                    ['label'=>'Восстановление пароля', 'url'=>['/user-management/auth/password-recovery']],
                    ['label'=>'Подтвердить почту', 'url'=>['/user-management/auth/confirm-email']],
                ],
            ],
        ],
    ]);
}
elseif (Yii::$app->user->identity->hasRole('Driver')) {
    echo GhostMenu::widget([
        'encodeLabels'=>false,
        'activateParents'=>true,
        'items' => [
            [
                'label' => 'Backend routes',
                'items'=>UserManagementModule::menuItems()
            ],
            [
                'label' => 'Действия',
                'items'=>[
                    //['label'=>'Login', 'url'=>['/user-management/auth/login']],
                    ['label'=>'Выйти', 'url'=>['/user-management/auth/logout']],
                    //['label'=>'Registration', 'url'=>['/user-management/auth/registration']],
                    ['label'=>'Сменить пароль', 'url'=>['/user-management/auth/change-own-password']],
                    ['label'=>'Восстановление пароля', 'url'=>['/user-management/auth/password-recovery']],
                    ['label'=>'Подтвердить почту', 'url'=>['/user-management/auth/confirm-email']],
                    ['label'=>'Создать заявку на ремонт', 'url'=>['/requests/create']],
                    ['label'=>'Ваши заявки', 'url'=>['/requests/index']],
                ],
            ],
        ],
    ]);
}
else if (Yii::$app->user->identity->hasRole('Master')) {
    echo GhostMenu::widget([
        'encodeLabels'=>false,
        'activateParents'=>true,
        'items' => [
            [
                'label' => 'Backend routes',
                'items'=>UserManagementModule::menuItems()
            ],
            [
                'label' => 'Действия',
                'items'=>[
                    //['label'=>'Login', 'url'=>['/user-management/auth/login']],
                    ['label'=>'Выйти', 'url'=>['/user-management/auth/logout']],
                    //['label'=>'Registration', 'url'=>['/user-management/auth/registration']],
                    ['label'=>'Сменить пароль', 'url'=>['/user-management/auth/change-own-password']],
                    ['label'=>'Восстановление пароля', 'url'=>['/user-management/auth/password-recovery']],
                    ['label'=>'Подтвердить почту', 'url'=>['/user-management/auth/confirm-email']],
                    ['label'=>'Зарегистрировать мастерскую в системе', 'url'=>['/masters/create']]

                ],
            ],
        ],
    ]);
}
else {
    echo '<div class="jumbotron">';
        echo '<h3>Вы здесь впервые. Определите себя к одному из двух классов</h3>';
            echo Html::a('Я водитель', ['/site/driver'], ['class'=>'btn btn-primary']);
            echo Html::a('Я мастер', ['/site/master'], ['class'=>'btn btn-primary']);
    echo '</div>';
}
