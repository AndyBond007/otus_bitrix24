<?php

namespace Models\Lists;

use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\TextField;
use Models\AbstractIblockPropertyValuesTable;
use Bitrix\Main\ORM\Fields\FloatField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Validators\LengthValidator;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;


use Models\Lists\ProceduresPropertyValuesTable as ProceduresTable;

class DoctorsPropertyValuesTable extends AbstractIblockPropertyValuesTable
{
    const IBLOCK_ID = 16;
}
