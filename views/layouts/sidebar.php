<?php

use app\common\AdminMenu;
use hail812\adminlte\widgets\Menu;

?>
<nav class="pcoded-navbar">
    <div class='nav-list'>
        <?= AdminMenu::widget([

            'items'         => [
                ['label' => 'Dashboard', 'header' => true],
                [
                    'label' => 'Starter Pages',
                    'icon'  => 'tachometer-alt',
                    'iconStyle' => 'fa',
                    'badge' => '<span class="pcoded-badge label label-warning">2</span>',
                    'items' => [
                        ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                        ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                    ]
                ],
                [
                    'label' => 'Simple Link',
                    'icon'  => 'package',
                    'badge' => '<span class="pcoded-badge label label-danger">New</span>'
                ],
                ['label' => 'Yii2 PROVIDED', 'header' => true],
                [
                    'label'   => 'Login',
                    'url'     => ['site/login'],
                    'icon'    => 'log-in',
                    'visible' => Yii::$app->user->isGuest
                ],
                ['label' => 'Gii', 'icon' => 'file', 'url' => ['/gii'], 'target' => '_blank'],
                ['label' => 'Debug', 'icon' => 'sliders', 'url' => ['/debug'], 'target' => '_blank'],
                ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
                ['label' => 'Level1'],
                [
                    'label' => 'Level1',
                    'items' => [
                        ['label' => 'Level2', 'iconStyle' => 'far'],
                        [
                            'label'     => 'Level2',
                            'iconStyle' => 'far',
                            'items'     => [
                                ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                            ]
                        ],
                        ['label' => 'Level2', 'iconStyle' => 'far']
                    ]
                ],
                ['label' => 'Level1'],
                ['label' => 'LABELS', 'header' => true],
                ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
            ],
        ]); ?>
    </div>
</nav>

