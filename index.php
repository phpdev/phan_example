<?php declare(strict_types=1);

/**
 * @return string
 */
function getStatus(): string
{
    return 'OK';
}

echo 'Status: ' . getStatus();