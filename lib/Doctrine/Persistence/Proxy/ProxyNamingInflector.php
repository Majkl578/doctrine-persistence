<?php

namespace Doctrine\Persistence\Proxy;

interface ProxyNamingInflector
{
    public function getRealClassName(string $className) : string;
}
