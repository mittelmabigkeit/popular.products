<?php

use App\SmartFilterLinks;
use \Bitrix\Main\Loader;
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;


class PopularProducts extends CBitrixComponent
{
    private function chekModules()
    {
        if (Loader::includeModule('iblock')) {
            return true;
        }
        return false;
    }

    protected function getProducts()
    {
        $count = $this->arParams['COUNT'];
        $brands = $this->arParams['BRANDS'];
        $iblockId = $this->arParams['IBLOCK_ID'];

        $arSelect = ['ID', 'DETAIL_PICTURE', 'NAME', 'PROPERTY_BREND', 'DETAIL_PAGE_URL', 'PROPERTY_SP_STRANA_PROIZVODSTVA_1'];
        $arFilter = ['PROPERTY_BREND' => $brands, 'IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'];
        $res = CIBlockElement::GetList(['RAND' => 'ASC'], $arFilter, false, ['nTopCount' => $count], $arSelect);
        
        $products = [];
        while($ob = $res->GetNextElement())
        {
            $arFields = $ob->GetFields();
            
            $offers = CCatalogSKU::getOffersList($arFields['ID'], $iblockId, ['ACTIVE' => 'Y'], ['NAME', 'ID', 'CATALOG_QUANTITY', 'SORT'], []);
            foreach ($offers[$arFields['ID']] as &$offer)
            {
                $offer['PRICE'] = CPrice::GetBasePrice($offer['ID']);
                $offer['PRICE'] = round($offer['PRICE']['PRICE'], 0);
            }
            $arFields['OFFERS'] = $offers;
            $arFields['DETAIL_PICTURE'] = CFile::GetPath($arFields['DETAIL_PICTURE']);
            $products[] = $arFields;
        }

        $this->arResult['PRODUCTS'] = $products;

        //echo "SERVER<pre>".print_r($products, true)."</pre>";

    }


    public function executeComponent()
    {
        $this->chekModules();
        $this->getProducts();

        $this->includeComponentTemplate();
    }
}
