<?php

namespace Doctrine\Persistence\Proxy;

use Doctrine\Common\Persistence\Proxy;
use function strrpos;
use function substr;

/**
 * @internal Default proxy inflector for 1.x Proxy interface that acts as a polyfill until Persistence 2.0.
 */
final class DefaultProxyNamingInflector implements ProxyNamingInflector
{
    /**
     * Gets the real class name of a class name that could be a proxy.
     */
    public function getRealClassName(string $className) : string
    {
        $pos = strrpos($className, '\\' . Proxy::MARKER . '\\');

        if ($pos === false) {
            return $className;
        }

        return substr($className, $pos + Proxy::MARKER_LENGTH + 2);
    }
}
