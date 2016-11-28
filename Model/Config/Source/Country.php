<?php
/**
 * Shopper's mind certified shop satisfaction survey
 *
 * @author    Uros Grilc <info@urosgrilc.com>
 * @category  ShoppersMind
 * @package   TrackingCode
 * @copyright Copyright (c) 2016 Ceneje d.o.o. (https://www.ceneje.si)
 */

namespace ShoppersMind\TrackingCode\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class Type
 */
class Country implements OptionSourceInterface
{
    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 'sl', 'label' => __('Slovenia')),
            array('value' => 'hr', 'label' => __('Croatia'))
        );
    }
}
