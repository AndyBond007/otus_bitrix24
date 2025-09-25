<?php

namespace Models;

use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\PropertyEnumerationTable;
use Bitrix\Iblock\PropertyTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\Data\Cache;
use Bitrix\Main\DB\SqlExpression;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\NotImplementedException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\StringField;
use Bitrix\Main\ORM\Data\DeleteResult;
use Bitrix\Main\ORM\Fields\DatetimeField;
use Bitrix\Main\ORM\Fields\ExpressionField;
use Bitrix\Main\SystemException;
use CIBlockElement;

/**
 * Class AbstractIblockPropertyValueTable
 *
 * @package Models
 */
abstract class AbstractIblockPropertyValuesTable extends DataManager
{
    const IBLOCK_ID = null;

    protected static ?array $properties = null;
    protected static ?CIBlockElement $iblockElement = null;

    /**
     * @return string
     */
    public static function getTableName(): string
    {
        return 'b_iblock_element_prop_s' . static::IBLOCK_ID;
    }

    /**
     * @return string
     */
    public static function getTableNameMulti(): string
    {
        return 'b_iblock_element_prop_m' . static::IBLOCK_ID;
    }

    /**
     * @return array
     * @throws ArgumentException
     * @throws SystemException
     */
    public static function getMap(): array
    {
        return parent::getMap();
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    // public static function add(array $data): bool
    // {
    //     return parent::$add($data);
    // }

    /**
     * @param $primary
     *
     * @return DeleteResult
     * @throws NotImplementedException
     */
    // public static function delete($primary): DeleteResult
    // {
    //     return parent::$delete($primary);
    //     //throw new NotImplementedException();
    // }

    /**
     * @return array
     * @throws ArgumentException
     * @throws SystemException
     * @throws ObjectPropertyException
     */
    public static function getProperties(): array
    {
        if (isset(static::$properties[static::IBLOCK_ID])) {
            return static::$properties[static::IBLOCK_ID];
        }

        $dbResult = PropertyTable::query()
            ->setSelect(['ID', 'CODE', 'PROPERTY_TYPE', 'MULTIPLE', 'NAME', 'USER_TYPE'])
            ->where('IBLOCK_ID', static::IBLOCK_ID)
            ->exec();
        while ($row = $dbResult->fetch()) {
            static::$properties[static::IBLOCK_ID][$row['CODE']] = $row;
        }

        return static::$properties[static::IBLOCK_ID] ?? [];
    }

    /**
     * @param  string  $code
     *
     * @return int
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public static function getPropertyId(string $code): int
    {
        return (int) static::getProperties()[$code]['ID'];
    }

    /**
     * @return array
     */
    public static function getMultipleFieldValueModifier(): array
    {
        return [fn($value) => array_filter(explode("\0", $value))];
    }

    /**
     * @param  int|null  $iblockId
     */
    public static function clearPropertyMapCache(?int $iblockId = null): void
    {
        $iblockId = $iblockId ?: static::IBLOCK_ID;
        if (empty($iblockId)) {
            return;
        }

        Cache::clearCache(true, "iblock_property_map/$iblockId");
    }

    /**
     * @param  string  $propertyCode
     * @param  string  $byKey
     *
     * @return array
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public static function getEnumPropertyOptions(string $propertyCode, string $byKey = 'ID'): array
    {
        $dbResult = PropertyEnumerationTable::getList([
            'select' => ['ID', 'VALUE', 'XML_ID', 'SORT'],
            'filter' => ['=PROPERTY.CODE' => $propertyCode, 'PROPERTY.IBLOCK_ID' => static::IBLOCK_ID],
        ]);
        while ($row = $dbResult->fetch()) {
            $enumPropertyOptions[$row[$byKey]] = $row;
        }

        return $enumPropertyOptions ?? [];
    }

    /**
     * @return string
     */
    private static function getMultipleValuesTableClass(): string
    {
        $className = end(explode('\\', static::class));
        $namespace = str_replace('\\' . $className, '', static::class);
        $className = str_replace('Table', 'MultipleTable', $className);

        return $namespace . '\\' . $className;
    }

    /**
     * @return void
     */
    private static function initMultipleValuesTableClass(): void
    {
        $className = end(explode('\\', static::class));
        $namespace = str_replace('\\' . $className, '', static::class);
        $className = str_replace('Table', 'MultipleTable', $className);

        if (class_exists($namespace . '\\' . $className)) {
            return;
        }

        $iblockId = static::IBLOCK_ID;
    }
}
