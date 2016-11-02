<?php
/**
 * Conversion Rate Reporting
 *
 * @author    Uros Grilc <info@urosgrilc.com>
 * @category  Ceneje
 * @package   Conversion
 * @copyright Copyright (c) 2016 Ceneje d.o.o. (https://www.ceneje.si)
 */

namespace Ceneje\Conversion\Model\Config\Source;

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
        return [
            ['value' => 'sl', 'label' => __('Slovenia')],
            ['value' => 'hr', 'label' => __('Croatia')]
        ];
    }
}
