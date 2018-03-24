<?php

namespace Etherscan\Api;

/**
 * Class Contract
 * @package Etherscan\Api
 * @author Maslakou Ihar <igormaslakoff@gmail.com>
 */
class Contract extends AbstractApi
{

    /**
     * Get Contract ABI for Verified Contract Source Codes.
     * (Newly verified Contracts are synched to the API servers within 5 minutes or less).
     *
     * @param string $address Ether address.
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getABI($address) {
        return $this->request->exec([
            'module' => "contract",
            'action' => "getabi",
            'address' => $address
        ]);
    }

    /**
     * Get Contract ABI for Verified Contract Source Codes.
     * (Newly verified Contracts are synched to the API servers within 5 minutes or less).
     *
     * @param string $address Ether address.
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getContractABI($address) {
        return $this->getABI($address);
    }
}