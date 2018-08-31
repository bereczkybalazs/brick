<?php

namespace Core;

use League\Di\Container;

class InterfaceBinder
{

    public function bindInterfaces(Container &$container)
    {
        $interfaces = get_declared_interfaces();
        foreach ($interfaces as $interface) {
            if ($this->isAppInterface($interface)) {
                $container->bind(
                    $interface,
                    $this->getBindingName($interface)
                );
            }
        }
    }

    private function isAppInterface($interface)
    {
        return strpos($interface, 'App\\Contracts') !== false;
    }

    private function getBindingName($interface)
    {
        $interface = str_replace('\\Contracts', '', $interface);
        $interface = str_replace('Interface', '', $interface);
        return $interface;
    }
}