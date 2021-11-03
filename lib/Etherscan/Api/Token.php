<?php

namespace Etherscan\Api;

/**
 * Class Token
 * @package Etherscan\Api
 * @author Maslakou Ihar <igormaslakoff@gmail.com>
 */
class Token extends AbstractApi
{
    /**
     * Get ERC20-Token TotalSupply by ContractAddress
     * Returns the current amount of an ERC-20 token in circulation.
     *
     * @param string $contractAddress the contract address of the ERC-20 token
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getTokenSupply($contractAddress)
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "tokensupply",
            'contractaddress' => $contractAddress
        ]);
    }

    /**
     * Get ERC20-Token Account Balance for TokenContractAddress
     * Returns the current balance of an ERC-20 token of an address.
     *
     * @param string $contractAddress the contract address of the ERC-20 token
     * @param string $address the string representing the address to check for token balance
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getTokenBalance($contractAddress, $address)
    {
        return $this->request->exec([
            'module' => "account",
            'action' => "tokenbalance",
            'contractaddress' => $contractAddress,
            'address' => $address
        ]);
    }

    /**
     * Get Historical ERC20-Token TotalSupply by ContractAddress & BlockNo
     * Returns the amount of an ERC-20 token in circulation at a certain block height.
     *
     * @param string $contractAddress the contract address of the ERC-20 token
     * @param string $blockNumber the integer block number to check total supply for eg. 12697906
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getTokenSupplyHistory($contractAddress, $blockNumber)
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "tokensupplyhistory",
            'contractaddress' => $contractAddress,
            'blockno' => $blockNumber
        ]);
    }

    /**
     * Get Historical ERC20-Token Account Balance for TokenContractAddress by BlockNo
     * Returns the balance of an ERC-20 token of an address at a certain block height.
     *
     * @param string $contractAddress the contract address of the ERC-20 token
     * @param string $address the string representing the address to check for balance
     * @param string $blockNumber the integer block number to check total supply for eg. 12697906
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getTokenBalanceHistory($contractAddress, $address, $blockNumber)
    {
        return $this->request->exec([
            'module' => "account",
            'action' => "tokenbalancehistory",
            'contractaddress' => $contractAddress,
            'address' => $address,
            'blockno' => $blockNumber
        ]);
    }

    /**
     * Get Token Info by ContractAddress
     * Returns project information and social media links of an ERC-20/ERC-721 token.
     *
     * @param string $contractAddress the contract address of the ERC-20/ERC-721 token to retrieve token info
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getTokenInfo($contractAddress)
    {
        return $this->request->exec([
            'module' => "token",
            'action' => "tokeninfo",
            'contractaddress' => $contractAddress
        ]);
    }
}
