<?php

namespace Etherscan\Api;

/**
 * Class Transaction
 * @package Etherscan\Api
 * @author Maslakou Ihar <igormaslakoff@gmail.com>
 */
class Transaction extends AbstractApi
{

    /**
     * Check Contract Execution Status (if there was an error during contract execution).
     * Note: isError":"0" = Pass , isError":"1" = Error during Contract Execution.
     *
     * @param string $transactionHash
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getStatus($transactionHash) {
        return $this->request->exec([
            'module' => "transaction",
            'action' => "getstatus",
            'txhash' => $transactionHash
        ]);
    }

    /**
     * Check Contract Execution Status (if there was an error during contract execution).
     * Note: isError":"0" = Pass , isError":"1" = Error during Contract Execution.
     *
     * @param string $transactionHash
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getContractExecutionStatus($transactionHash) {
        return $this->getStatus($transactionHash);
    }
}