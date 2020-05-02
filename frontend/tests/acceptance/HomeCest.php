<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->see('Походы. Трекинг по Приэльбрусью');

        $I->seeLink('Такси');
        $I->click('Такси');
        //$I->wait(2); // wait for page to be opened

        $I->see('Not Found (#404)');
    }
}
