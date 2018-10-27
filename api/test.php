<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

# тестовые наборы данных
$section = 'Насосы гидроусилителя руля ГУР (новые)';
$idTesting = 772734;
$iBlockId = 57;
/*
Насос ГУР ACURA MDX (YD2) 3.7 AWD
*/

class testingLine{
    function getPriceElementId($elementId){
        CModule::IncludeModule("catalog");
        $zapros = CPrice::GetList(
            array(),
            array("PRODUCT_ID" => $elementId)
        );
        return $zapros->Fetch();
    }
    function getIbElementId($elementId){
        CModule::IncludeModule("iblock");
        global $iBlockId;
        $zapros = CIBlockElement::GetList(
            array(),
            array(
                "IBLOCK_ID" =>  $iBlockId,
                "ID"        =>  $elementId,
                #"IBLOCK_SECTION_ID" => 11226
            ),
            false,
            false,
            array(
                "ID",
                "IBLOCK_ID",
                "IBLOCK_SECTION_ID",
                "ACTIVE",
                "NAME",
                "PREVIEW_PICTURE",
                "PREVIEW_TEXT",
                "DETAIL_PICTURE",
                "DETAIL_TEXT",
                "SEARCHABLE_CONTENT",
                "CODE",
                "XML_ID",
                "EXTERNAL_ID",
                "TMP_ID",
                "IBLOCK_NAME",
                "CATALOG_*",
                "PROPERTY_*"
            )
        );
        while ($row = $zapros->GetNextElement()){
            $result[$row->GetFields()["ID"]] = $row->GetFields();
            $result[$row->GetFields()["ID"]]["PROPERTY"] = $row->GetProperties();;
        }
        return $result;
        #return;
    }
}

/*
CModule::IncludeModule("iblock");
$res = CIBlockElement::GetByID($idTesting);
$ilsResult = $res->GetNext();
*/

$ilsResult = testingLine::getIbElementId($idTesting);

if(!empty($ilsResult)){
    echo '<pre style="color:green">'; print_r($ilsResult); '</pre>';
    #echo '<pre style="color:green">'; print_r(count($ilsResult)); '</pre>';
}
?>