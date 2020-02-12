<?php

namespace App\Enum;

use App\Enum\Enum;

class StatusEnum extends Enum
{
    public const NEW_TASK = 1;

    public const IN_PROCCESS = 2;

    public const DONE = 3;

    public static function getDescription(int $value): string
    {
        switch ($value) {
            case self::NEW_TASK:
                return 'New task';
            break;
            case self::IN_PROCCESS:
                return 'In proccess';
            break;
            case self::DONE:
                return 'Done';
            break;
        }
    }
}