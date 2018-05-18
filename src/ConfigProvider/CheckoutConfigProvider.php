<?php
/**
 * Copyright © 2018 Rubic. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Rubic\CleanCheckoutAutocomplete\ConfigProvider;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class CheckoutConfigProvider implements ConfigProviderInterface
{
    const CONFIG_PATH_AUTO_COMPLETE_ENABLED   = 'clean_checkout/auto_complete/enabled';
    const CONFIG_PATH_AUTO_COMPLETE_API_KEY   = 'clean_checkout/auto_complete/api_key';
    const CONFIG_PATH_AUTO_COMPLETE_SPLIT     = 'clean_checkout/auto_complete/split_street_fields';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return [
            'autoComplete' => [
                'enabled' => (bool)$this->scopeConfig->getValue(
                    self::CONFIG_PATH_AUTO_COMPLETE_ENABLED,
                    ScopeInterface::SCOPE_STORE
                ),
                'apiKey' => $this->scopeConfig->getValue(
                    self::CONFIG_PATH_AUTO_COMPLETE_API_KEY,
                    ScopeInterface::SCOPE_STORE
                ),
                'splitStreetFields' => (bool)$this->scopeConfig->getValue(
                    self::CONFIG_PATH_AUTO_COMPLETE_SPLIT,
                    ScopeInterface::SCOPE_STORE
                ),
            ]
        ];
    }
}
