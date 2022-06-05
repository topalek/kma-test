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
class AdminMenu extends Menu
{

    /**
     * @inheritdoc
     */
    public $linkTemplate = '<a class="waves-effect waves-dark {active}" href="{url}" {target}>{icon} {label} {badge}</a>';

    /**
     * @inheritdoc
     */
    public $labelTemplate = '<span class="pcoded-mtext">{label}</span>';

    /**
     * @var string treeview wrapper
     */
    public $treeTemplate = "\n<ul class='pcoded-submenu'>\n{items}\n</ul>\n";

    /**
     * @var string
     */
    public static $iconDefault = 'circle';

    /**
     * @var string
     */
    public static $iconStyleDefault = 'feather';

    /**
     * @inheritdoc
     */
    public $itemOptions = ['class' => ''];

    /**
     * @inheritdoc
     */
    public $activateParents = true;

    /**
     * @inheritdoc
     */
    public $options = [
        'class'          => 'pcoded-inner-navbar main-menu',
        'data-widget'    => 'treeview',
        'role'           => 'menu',
        'data-accordion' => 'true',
        'tag'            => 'div',
    ];

    protected function renderItems($items)
    {
        $n = count($items);
        $lines = [];
        foreach ($items as $i => $item) {
            $isHeader = false;
            $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));

            if (isset($item['items'])) {
                Html::addCssClass($options, 'pcoded-hasmenu pcoded-trigger');
            }

            $tag = ArrayHelper::remove($options, 'tag', 'li');
            if (isset($item['header']) && $item['header']) {
                Html::removeCssClass($options, 'nav-item');
                Html::addCssClass($options, 'pcoded-navigation-label');
                $tag = 'div';
                $isHeader = true;
            }

            $class = [];
            if ($item['active']) {
                $class[] = $this->activeCssClass;
            }
            if ($i === 0 && $this->firstItemCssClass !== null) {
                $class[] = $this->firstItemCssClass;
            }
            if ($i === $n - 1 && $this->lastItemCssClass !== null) {
                $class[] = $this->lastItemCssClass;
            }
            Html::addCssClass($options, $class);
            if ($isHeader) {
                if (!empty($lines)){
                    $lines[] = Html::endTag('ul');
                }
                $lines[] = Html::tag($tag, $item['label'], $options);
                $lines[] = Html::beginTag('ul',  ['class'=>'pcoded-item pcoded-left-item']);
                continue;
            }
            $menu = $this->renderItem($item);
            if (!empty($item['items'])) {
                $treeTemplate = ArrayHelper::getValue($item, 'treeTemplate', $this->treeTemplate);
                $menu .= strtr($treeTemplate, [
                    '{items}' => $this->renderItems($item['items']),
                ]);
                if ($item['active']) {
                    $options['class'] .= ' menu-open';
                }
            }

            $lines[] = Html::tag($tag, $menu, $options);
        }

        return implode("\n", $lines);
    }

    protected function renderItem($item)
    {
        if (isset($item['header']) && $item['header']) {
            return $item['label'];
        }

        if (isset($item['iconClass'])) {
            $iconClass = $item['iconClass'];
        } else {
            $iconStyle = $item['iconStyle'] ?? static::$iconStyleDefault;
            $icon = $item['icon'] ?? static::$iconDefault;
            $iconClassArr = [$iconStyle, 'icon-' . $icon, 'fa-'.$icon];
            isset($item['iconClassAdded']) && $iconClassArr[] = $item['iconClassAdded'];
            $iconClass = implode(' ', $iconClassArr);
        }
        $iconHtml = '<span class="pcoded-micon"><i class="' . $iconClass . '"></i></span>';

        $treeFlag = '';
        if (isset($item['items'])) {
            $treeFlag = '<i class="right fas fa-angle-left"></i>';
        }

        $template = ArrayHelper::getValue(
            $item,
            'template',
            (isset($item['linkTemplate'])) ? $item['linkTemplate'] : $this->linkTemplate
        );
        return strtr($template, [
            '{label}'  => strtr($this->labelTemplate, [
                '{label}'    => $item['label'],
                '{treeFlag}' => $treeFlag
            ]),
            '{url}'    => isset($item['url']) ? Url::to($item['url']) : '#',
            '{icon}'   => $iconHtml,
            '{badge}'    => $item['badge'] ?? '',
            '{active}' => $item['active'] ? $this->activeCssClass : '',
            '{target}' => isset($item['target']) ? 'target="' . $item['target'] . '"' : ''
        ]);
    }

}
