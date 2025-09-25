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
    public const IBLOCK_ID = 16;

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap(): array
    {
        return [
            'IBLOCK_ELEMENT_ID' => (new IntegerField(
                'IBLOCK_ELEMENT_ID',
                []
            ))->configureTitle(Loc::getMessage('ELEMENT_PROP_S16_ENTITY_IBLOCK_ELEMENT_ID_FIELD'))
                ->configurePrimary(true),
            'PROCEDURES' => (new TextField(
                'PROPERTY_64',
                []
            ))->configureTitle(Loc::getMessage('ELEMENT_PROP_S16_ENTITY_PROPERTY_64_FIELD')),
            'SURNAME' => (new TextField(
                'PROPERTY_65',
                []
            ))->configureTitle(Loc::getMessage('ELEMENT_PROP_S16_ENTITY_PROPERTY_65_FIELD')),
            'FIRST_NAME' => (new TextField(
                'PROPERTY_66',
                []
            ))->configureTitle(Loc::getMessage('ELEMENT_PROP_S16_ENTITY_PROPERTY_66_FIELD')),
            'MID_NAME' => (new TextField(
                'PROPERTY_67',
                []
            ))->configureTitle(Loc::getMessage('ELEMENT_PROP_S16_ENTITY_PROPERTY_67_FIELD')),

            'PROCEDURESX' => new ReferenceField(
                'PROCEDURESX',
                ProceduresTable::class,
                ['=this.IBLOCK_ELEMENT_ID' => 'ref.IBLOCK_ELEMENT_ID']
            )

            // 'PROCEDURESXX' => new ReferenceField(
            //     'PROCEDURESXX',
            //     ProceduresTable::class,
            //     ['=this.IBLOCK_ELEMENT_ID' => 'ref.IBLOCK_ELEMENT_ID']
            // ),
        ];
    }
}
