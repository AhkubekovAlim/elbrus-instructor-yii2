<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 05.05.2020
 * Time: 10:09
 */

namespace common\helpers;


class HtmlHelper
{
    /**
     * Возвращает отображение дерева $tree
     * @param array $tree
     * @param string $controllerUrl
     * @param string $childKey
     * @param string $idPrefix
     * @return string
     */
    public static function getCollapseTree(array $tree = [], string $controllerUrl = '', string $childKey = 'nodes', string $idPrefix = 'collapse-'){
        $result = '<ul class="list-group">';
        foreach($tree as $key => $element){
            $elementId = $idPrefix . $element['uuid'];
            $result .= '<li class="list-group-item">';
            // Если есть дочерние элементы
            if($childNodes = $element[$childKey]){
                $result .= '<div class="collapse-btn" data-toggle="collapse" data-target="#' . $elementId . '" aria-expanded="true" aria-controls="' . $elementId . '">
                                <span class="icon expand-icon glyphicon glyphicon-minus"></span>'
                                . $element['title']
                            .'</div>';
                $result .= self::getControls($controllerUrl, $element['id']); // показывает кнопки view/update/delete
                $result .= '<div class="collapse in" id="' . $elementId . '">';
                $result .= self::getCollapseTree($childNodes, $controllerUrl, $childKey, $idPrefix);
                $result .= '</div>';
            } else {
                $result .= $element['title'];
                $result .= self::getControls($controllerUrl, $element['id']);
            }
            $result .= '</li>';
        }
        $result .= '</ul>';
        return $result;
    }

    /**
     * @param string $controllerUrl
     * @param null $elementId
     * @return string
     */
    public static function getControls($controllerUrl = '', $elementId = null){
        if($controllerUrl && $elementId) {
         return
             '<div class="pull-right">
                  <a href="' . $controllerUrl . '/create?parent_id=' . $elementId . '" title="Создать дочерний" aria-label="Создать дочерний" data-pjax="0">
                      <span class="glyphicon glyphicon-plus-sign"></span>
                  </a> 
                  <a href="' . $controllerUrl . '/view?id=' . $elementId . '" title="Смотреть" aria-label="Смотреть" data-pjax="0">
                      <span class="glyphicon glyphicon-eye-open"></span>
                  </a> 
                  <a href="' . $controllerUrl . '/update?id=' . $elementId . '" title="Изменить" aria-label="Изменить" data-pjax="0">
                      <span class="glyphicon glyphicon-pencil"></span>
                  </a> 
                  <a href="' . $controllerUrl . '/delete?id=' . $elementId . '" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Are you sure you want to delete this item?" data-method="post">
                      <span class="glyphicon glyphicon-trash"></span>
                  </a>
              </div>';
        }
    }
}