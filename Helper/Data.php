<?php
/**
 * Shopper's mind certified shop satisfaction survey
 *
 * @author    Uros Grilc <info@urosgrilc.com>
 * @category  SMind
 * @package   TrackingCode
 * @copyright Copyright (c) 2016 Ceneje d.o.o. (https://www.ceneje.si)
 */

namespace SMind\TrackingCode\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const CONFIG_PATH = 'smind_trackingcode/';

    /**
     * Config meta method for getting config
     *
     * @param string $code
     * @param string $group
     * @return mixed
     */
    public function getConfig($code, $group)
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH . "$group/$code", \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * Is Conversion enabled
     *
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->getConfig('enabled', 'general');
    }

    /**
     * Project Key from system config
     *
     * @return string
     */
    public function getKey()
    {
        return $this->getConfig('key', 'general');

    }

    /**
     * Selected Country from system config
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->getConfig('country', 'general');
    }
}
