<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Status extends Enum
{
    
    const Inactive =   0;
    const Active =   1;

    public static function getDescription($value): string
    {
        if ($value === self::Inactive) {
            return 'Inactive';
        }
        if ($value === self::Active) {
            return 'Active';
        }

        return parent::getDescription($value);
    }

}
