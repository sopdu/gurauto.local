<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

# тестовые наборы данных
$section = 'Насосы гидроусилителя руля ГУР (новые)';
$idTesting = 772734;

/*
Насос ГУР ACURA MDX (YD2) 3.7 AWD
*/

# смотрим, что содержит элемент каталога
if (
    CModule::IncludeModule("catalog") and
    CModule::IncludeModule("iblock")
){
    $zaprosElement = CCatalogProduct::GetByID($idTesting);
    $ilsResult = $zaprosElement;
}

if(!empty($ilsResult)){
    echo '<pre style="color:green">'; print_r($ilsResult); '</pre>';
}
?>