<?php

namespace Etherscan;

/**
 * Class APIConf
 * @package Etherscan
 * @author Maslakou Ihar <igormaslakoff@gmail.com>
 */
class APIConf
{
    const API_URL = "https://api.etherscan.io/api";

    const TESTNET_ROPSTEN = "api-ropsten";
    const TESTNET_KOVAN = "api-kovan";
    const TESTNET_RINKEBY = "api-rinkeby";

    const TAG_LATEST = "latest";

    const BLOCK_TYPE_BLOCKS = "blocks";
    const BLOCK_TYPE_UNCLES = "uncles";

    /**
     * Returns API URL
     *
     * @param null $net
     * @return string
     */
    public static function getAPIUrl($net = null) {
        if (is_null($net)) {
            return self::API_URL;
        }

        return "https://{$net}.etherscan.io/api";
    }
}