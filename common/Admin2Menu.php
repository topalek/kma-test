<?php

namespace app\common;

use hail812\adminlte\widgets\Menu;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Created by topalek
 * Date: 04.06.2022
 * Time: 13:54
 */
class Admin2Menu extends Widget
{
    public array $items = [];

    public function run()
    {
        $lines = [];
        foreach ($this->items as $i => $item) {
//            dd($item['items']);
            $lines[] = Html::tag('div', $item['label'], ['class' => 'pcoded-navigation-label']);
            try {
                $lines[] = Menu::widget([
                    'items'        => $item['items'],
                    'options'      => [
                        'class' => 'pcoded-item pcoded-left-item'
                    ],
                    'submenuTemplate' => "\n<ul class='' >\n{items}\n</ulcla>\n",
                    'itemOptions' => [
                        'class' => 'pcoded-hasmenu pcoded-trigger'
                    ],
                    'linkTemplate' => '<a class="waves-effect waves-dark {active}" href="{url}" {target}>
                    <span class="pcoded-micon">{icon}</span><span class="pcoded-mtext">{label}</span></a>',
                ]);
            } catch (\Exception $e) {
                dd($item,$e->getMessage());
            }
        }

        return implode("\n", $lines);
    }

}
