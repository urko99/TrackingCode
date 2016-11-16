<?php
/**
 * Shopper's mind certified shop satisfaction survey
 *
 * @author    Uros Grilc <info@urosgrilc.com>
 * @category  ShoppersMind
 * @package   TrackingCode
 * @copyright Copyright (c) 2016 Ceneje d.o.o. (https://www.ceneje.si)
 */

namespace ShoppersMind\TrackingCode\Block;

use Magento\Checkout\Model\Session;
use Magento\Sales\Model\Order;
use Magento\Framework\View\Element\Template\Context;
use ShoppersMind\TrackingCode\Helper\Data;

class Code extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Data
     */
    protected $_helper;

    /**
     * @var Session
     */
    protected $_checkoutSession;

    /**
     * @param Context $context
     * @param Session $checkoutSession
     * @param Data $helper
     */
    public function __construct(
      Context $context,
      Session $checkoutSession,
      Data $helper
    ) {
        parent::__construct($context);
        $this->_helper = $helper;
        $this->_checkoutSession = $checkoutSession;
    }

    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    /**
     * Module enabled setting
     *
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->_helper->isEnabled();
    }

    /**
     * Project key getter
     *
     * @return string
     */
    public function getProjectKey()
    {
        return $this->_helper->getKey();
    }

    /**
     * Target server getter
     *
     * @return string
     */
    public function getServerUrl()
    {
        switch ($this->_helper->getCountry()) {
            case 'sl':
                return "cpx.smind.si";
                break;

            case 'hr':
                return "cpx.smind.hr";
                break;

            default:
                return "cpx.smind.si";
                break;
        }
    }

    /**
     * Retrieve identifier of created order
     *
     * @return string
     */
    public function getOrderId()
    {
        if (!empty($orderId = $this->_getData('order_id'))){
            return $orderId;
        } else {
            $this->_fillOrderData();
            return $this->_getData('order_id');
        }
    }

    /**
     * Products list with details getter
     *
     * @return array
     */
    public function getProducts()
    {
        if (!empty($products = $this->_getData('products'))){
            return $products;
        } else {
            $this->_fillOrderData();
            return $this->_getData('products');
        }
    }

    /**
     * Get last order ID from session and fill required data
     */
    protected function _fillOrderData()
    {
        $order = $this->_checkoutSession->getLastRealOrder();
        if ($order->getId()) {
            $this->addData(array(
              'order_id'  => $order->getIncrementId(),
              'products'  => $this->_prepareDataArray($order)
            ));
        }
    }

    /**
     * Get last order ID from session and fill required data
     *
     * @param Order $order
     * @return array
     */
    protected function _prepareDataArray(Order $order)
    {
        $products = array();
        $items = $order->getAllVisibleItems();

        foreach ($items as $item){
            array_push($products, array(
              "id"    =>  $item->getSku(),
              "name"  =>  $item->getName(),
              "price" =>  $item->getPriceInclTax(),
              "qty"   =>  $item->getQtyOrdered(),
            ));
        }

        return $products;
    }
}
