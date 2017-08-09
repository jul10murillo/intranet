<aside class="main-sidebar">

    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'MENÚ GESTIÓN INTRANET', 'options' => ['class' => 'header']],
                    ['label' => 'Roles/Grupos', 'icon' => 'group', 'url' => \yii\helpers\Url::to(['/rbac/role'])],
                    ['label' => 'Permisos', 'icon' => 'address-card', 'url' => \yii\helpers\Url::to(['/rbac/permission'])],
                    ['label' => 'Reglas', 'icon' => 'id-badge', 'url' => \yii\helpers\Url::to(['/rbac/rule'])],
                    ['label' => 'Asignaciones', 'icon' => 'user', 'url' => \yii\helpers\Url::to(['/rbac/assignment'])],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
