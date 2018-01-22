<?php
declare(strict_types=1);

namespace Payum\Server\Api\View;

use Payum\Core\Model\GatewayConfigInterface;
use Payum\Core\Security\Util\Mask;

/**
 * Class GatewayConfigToJsonConverter
 * @package Payum\Server\Api\View
 */
class GatewayConfigToJsonConverter
{
    /**
     * @param GatewayConfigInterface $gatewayConfig
     *
     * @return array
     */
    public function convert(GatewayConfigInterface $gatewayConfig)
    {
        $config = [];
        foreach ($gatewayConfig->getConfig() as $name => $value) {
            $config[$name] = Mask::mask($value, '*');
        }

        return [
            'gatewayName' => $gatewayConfig->getGatewayName(),
            'factoryName' => $gatewayConfig->getFactoryName(),
            'config' => $config,
        ];
    }
}
