<?php

namespace App;

use League\Di\Container;

class InterfaceBinder
{

    public static function bindInterfaces(Container &$container)
    {
        $interfaces = get_declared_interfaces();
        foreach ($interfaces as $interface) {
            if (self::isAppInterface($interface)) {
                $container->bind(
                    $interface,
                    self::getBindingName($interface)
                );
            }
        }
    }

    private static function isAppInterface($interface)
    {
        return strpos($interface, 'App\\Contracts') !== false;
    }

    private static function getBindingName($interface)
    {
        $interface = str_replace('\\Contracts', '', $interface);
        $interface = str_replace('Interface', '', $interface);
        return $interface;
    }
}