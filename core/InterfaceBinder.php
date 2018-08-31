<?php

namespace Core;

use League\Di\Container;

class InterfaceBinder
{
    protected $appNamespace = 'App';
    protected $interfaceNamespace = 'App\\Contracts';
    protected $interfacePostFix = 'Interface';

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
        return strpos($interface, $this->interfaceNamespace) !== false;
    }

    private function getBindingName($interface)
    {
        $interface = str_replace($this->interfaceNamespace, $this->appNamespace, $interface);
        $interface = str_replace($this->interfacePostFix, '', $interface);
        return $interface;
    }
}