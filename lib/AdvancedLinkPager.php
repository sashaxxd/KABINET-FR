<?php
/**
 * Created by PhpStorm.
 * User: saha
 * Date: 01.02.2018
 * Time: 16:32
 */

namespace app\lib;
use yii\widgets\LinkPager;

class AdvancedLinkPager extends LinkPager
{
    public function init()
    {
        parent::init();

        $this->prevPageLabel = false;
        $this->nextPageLabel = false;

        list($first, $last) = $this->getPageRange();
        $humanReadableFirst = $first + 1;
        $humanReadableLast = $last + 1;

        if ($humanReadableFirst == 2) {
            $this->maxButtonCount += 1;
        } elseif ($humanReadableFirst > 2) {
            $this->prevPageLabel = '..';
            $this->prevPageCssClass = 'disabled';
            $this->firstPageLabel = 1;
        }

        if ($humanReadableLast == $this->pagination->pageCount - 1) {
            $this->maxButtonCount += 2;
        } elseif ($humanReadableLast < $this->pagination->pageCount - 1) {
            $this->nextPageLabel = '..';
            $this->nextPageCssClass = 'disabled';
            $this->lastPageLabel = $this->pagination->pageCount;
        }
    }
}