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

    const TESTNET_GOERLI = "api-goerli";
    const TESTNET_ROPSTEN = "api-ropsten";
    const TESTNET_KOVAN = "api-kovan";
    const TESTNET_RINKEBY = "api-rinkeby";

    const TAG_EARLIEST = "earliest";
    const TAG_LATEST = "latest";
    const TAG_PENDING = "pending";

    const BLOCK_TYPE_BLOCKS = "blocks";
    const BLOCK_TYPE_UNCLES = "uncles";

    const BLOCK_CLOSEST_BEFORE = "before";
    const BLOCK_CLOSEST_AFTER = "after";

    public static $blockTypes = [
        self::BLOCK_TYPE_BLOCKS, self::BLOCK_TYPE_UNCLES
    ];

    const CLIENT_TYPE_GETH = "geth";
    const CLIENT_TYPE_PARITY = "parity";
    public static $clientTypes = [
        self::CLIENT_TYPE_GETH, self::CLIENT_TYPE_PARITY
    ];

    const SYNC_MODE_DEFAULT = "default";
    const SYNC_MODE_ARCHIVE = "archive";
    public static $syncModes = [
        self::SYNC_MODE_DEFAULT, self::SYNC_MODE_ARCHIVE
    ];

    /**
     * Returns API URL
     *
     * @param null $net
     * @return string
     */
    public static function getAPIUrl($net = null)
    {
        if (is_null($net)) {
            return self::API_URL;
        }

        return "https://{$net}.etherscan.io/api";
    }
}
