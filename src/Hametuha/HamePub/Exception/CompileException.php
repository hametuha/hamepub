<?php

namespace Hametuha\HamePub\Exception;

/**
 * Occurs on failing compilation
 *
 * @package Hametuha\HamePub\Exception
 */
class CompileException extends \Exception
{
    protected $code = 500;
}
