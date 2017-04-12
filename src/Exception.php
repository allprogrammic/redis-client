<?php

/*
 * This file is part of the AllProgrammic Redis Client package.
 *
 * (c) AllProgrammic SAS <contact@allprogrammic.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AllProgrammic\Component\Redis;

/**
 * Credis-specific errors, wraps native Redis errors
 */
class Exception extends \Exception
{
    const CODE_TIMED_OUT = 1;
    const CODE_DISCONNECTED = 2;

    public function __construct($message, $code = 0, $exception = null)
    {
        if ($exception && get_class($exception) == 'RedisException' && $message == 'read error on connection') {
            $code = self::CODE_DISCONNECTED;
        }

        parent::__construct($message, $code, $exception);
    }
}
