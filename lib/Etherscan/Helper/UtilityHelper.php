<?php

namespace Etherscan\Helper;

/**
 * Class UtilityHelper
 * @package Etherscan\Helper
 * @author Maslakou Ihar <igormaslakoff@gmail.com>
 */
class UtilityHelper
{

    /**
     * Converts Wei value to the Ether float value.
     *
     * @param int $amount
     *
     * @return float
     */
    public static function convertEtherAmount($amount) {
        return (float)$amount / pow(10, 18);
    }

    /**
     * Checks if transaction is input transaction.
     *
     * @param string $address Ether address.
     * @param array $transactionData Transaction data.
     *
     * @return bool
     */
    public static function isInputTransaction($address, $transactionData) {
        return (strtolower($transactionData['to']) === strtolower($address));
    }

    /**
     * Checks if transaction is output transaction.
     *
     * @param string $address Ether address.
     * @param array $transactionData Transaction data.
     *
     * @return bool
     */
    public static function isOutputTransaction($address, $transactionData) {
        return (strtolower($transactionData['from']) === strtolower($address));
    }
}