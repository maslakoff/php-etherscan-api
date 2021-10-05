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
    public function getABI($address)
    {
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
     *
     * @deprecated deprecated since version 1.1.1
     */
    public function getContractABI($address)
    {
        return $this->getABI($address);
    }

    /**
     * Get Contract Source Code for Verified Contract Source Codes
     * Returns the Solidity source code of a verified smart contract.
     *
     * @param string $address Ether address.
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getSourceCode($address)
    {
        return $this->request->exec([
            'module' => "contract",
            'action' => "getsourcecode",
            'address' => $address
        ]);
    }

    /**
     * Verify Source Code
     * Check Source Code Verification Submission Status
     *
     * @param string $guid Source Code GUID
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function checkVerifyStatus($guid)
    {
        return $this->request->exec([
            'module' => "contract",
            'action' => "checkverifystatus",
            'address' => $guid
        ]);
    }

    /**
     * Verify Proxy Contract
     * Checking Proxy Contract Verification Submission Status using cURL
     *
     * @param string $guid GUID
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function checkProxyVerification($guid)
    {
        return $this->request->exec([
            'module' => "contract",
            'action' => "checkproxyverification",
            'address' => $guid
        ]);
    }
}
