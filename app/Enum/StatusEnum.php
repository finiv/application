<?php

namespace App\Enum;

use App\Enum\Enum;

class StatusEnum extends Enum
{
    public const NEW_TASK = 1;

    public const IN_PROCCESS = 2;

    public const DONE = 3;
}