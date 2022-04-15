<?php

namespace Etherscan\Api;


use Etherscan\APIConf;
use Etherscan\Exception\ErrorException;
use Etherscan\Exception\InvalidArgumentException;

/**
 * Class Account
 * @package Etherscan\Api
 * @author Maslakou Ihar <igormaslakoff@gmail.com>
 */
class Account extends AbstractApi
{
    /**
     * Get Ether Balance for a single Address
     *
     * @param $address
     * @param $tag
     * @return mixed
     * @throws ErrorException
     */
    public function balance($address, $tag = APIConf::TAG_LATEST)
    {
        return $this->request->exec([
            'module' => "account",
            'action' => "balance",
            'address' => $address,
            'tag' => $tag
        ]);
    }

    /**
     * Get Ether Balance for multiple Addresses in a single call.
     *
     * @param string $addresses Ether address.
     * @param string $tag
     *
     * @return array
     * @throws ErrorException
     */
    public function balanceMulti($addresses, $tag = APIConf::TAG_LATEST)
    {
        if (is_array($addresses)) {
            $addresses = implode(",", $addresses);
        }

        return $this->request->exec([
            'module' => "account",
            'action' => "balancemulti",
            'address' => $addresses,
            'tag' => $tag
        ]);
    }

    /**
     * Get a list of 'Normal' Transactions by Address
     * (Returns up to a maximum of the last 10000 transactions only).
     *
     * @param string $address Ether address.
     * @param int $startBlock Starting blockNo to retrieve results
     * @param int $endBlock Ending blockNo to retrieve results
     * @param string $sort 'asc' or 'desc'
     * @param int $page Page number
     * @param int $offset Offset
     *
     * @return array
     * @throws ErrorException
     */
    public function transactionListByAddress($address, $startBlock = 0, $endBlock = 99999999, $sort = "asc", $page = null, $offset = null)
    {
        $params = [
            'module' => "account",
            'action' => "txlist",
            'address' => $address,
            'startblock' => $startBlock,
            'endblock' => $endBlock,
            'sort' => $sort
        ];

        if (!is_null($page)) {
            $params['page'] = (int)$page;
        }

        if (!is_null($offset)) {
            $params['offset'] = (int)$offset;
        }

        return $this->request->exec($params);
    }

    /**
     * Get a list of 'Internal' Transactions by Address
     * (Returns up to a maximum of the last 10000 transactions only).
     *
     * @param string $address Ether address.
     * @param int $startBlock Starting blockNo to retrieve results
     * @param int $endBlock Ending blockNo to retrieve results
     * @param string $sort 'asc' or 'desc'
     * @param int $page Page number
     * @param int $offset Offset
     *
     * @return array
     * @throws ErrorException
     */
    public function transactionListInternalByAddress($address, $startBlock = 0, $endBlock = 99999999, $sort = "asc", $page = null, $offset = null)
    {
        $params = [
            'module' => "account",
            'action' => "txlistinternal",
            'address' => $address,
            'startblock' => $startBlock,
            'endblock' => $endBlock,
            'sort' => $sort
        ];

        if (!is_null($page)) {
            $params['page'] = (int)$page;
        }

        if (!is_null($offset)) {
            $params['offset'] = (int)$offset;
        }

        return $this->request->exec($params);
    }

    /**
     * Get a list of 'ERC20 - Token Transfer Events' by Address
     *
     * Usage:
     *    ERC-20 transfers from an address, specify the address parameter
     *    ERC-20 transfers from a contract address, specify the contract address parameter
     *    ERC-20 transfers from an address filtered by a token contract, specify both address and contract address parameters.
     *
     * @param string $address representing the address to check for balance
     * @param int $contractAddress representing the token contract address to check for balance
     * @param string $sort 'asc' or 'desc'
     * @param int $page Page number
     * @param int $offset Offset
     *
     * @throws InvalidArgumentException if missed address
     *
     * @return array
     * @throws ErrorException
     */
    public function tokenERC20TransferListByAddress($address = null, $contractAddress = null, $sort = "asc", $page = null, $offset = null)
    {
        if (is_null($address) && is_null($contractAddress)) {
            throw new InvalidArgumentException('Please specify at least one address');
        }

        $params = [
            'module' => "account",
            'action' => "tokentx",
            'sort' => $sort
        ];

        if (!is_null($address)) {
            $params['address'] = $address;
        }

        if (!is_null($contractAddress)) {
            $params['contractaddress'] = $contractAddress;
        }

        if (!is_null($page)) {
            $params['page'] = (int)$page;
        }

        if (!is_null($offset)) {
            $params['offset'] = (int)$offset;
        }

        return $this->request->exec($params);
    }

    /**
     * Get a list of 'ERC721 - Token Transfer Events' by Address
     *
     * Usage:
     *    ERC-721 transfers from an address, specify the address parameter
     *    ERC-721 transfers from a contract address, specify the contract address parameter
     *    ERC-721 transfers from an address filtered by a token contract, specify both address and contract address parameters.
     *
     * @param string $address representing the address to check for balance
     * @param int $contractAddress representing the token contract address to check for balance
     * @param string $sort 'asc' or 'desc'
     * @param int $page Page number
     * @param int $offset Offset
     * @param int $startBlock Starting blockNo to retrieve results
     * @param int $endBlock Ending blockNo to retrieve results
     *
     * @throws InvalidArgumentException if missed address
     *
     * @return array
     * @throws ErrorException
     */
    public function tokenERC721TransferListByAddress($address = null, $contractAddress = null, $sort = "asc", $page = null, $offset = null, $startBlock = 0, $endBlock = 99999999)
    {
        if (is_null($address) && is_null($contractAddress)) {
            throw new InvalidArgumentException('Please specify at least one address');
        }

        $params = [
            'module' => "account",
            'action' => "tokennfttx",
            'startblock' => $startBlock,
            'endblock' => $endBlock,
            'sort' => $sort
        ];

        if (!is_null($address)) {
            $params['address'] = $address;
        }

        if (!is_null($contractAddress)) {
            $params['contractaddress'] = $contractAddress;
        }

        if (!is_null($page)) {
            $params['page'] = (int)$page;
        }

        if (!is_null($offset)) {
            $params['offset'] = (int)$offset;
        }

        return $this->request->exec($params);
    }

    /**
     * Get "Internal Transactions" by Transaction Hash.
     *
     * @param string $transactionHash
     *
     * @return array
     * @throws ErrorException
     */
    public function transactionListInternalByHash($transactionHash)
    {
        return $this->request->exec([
            'module' => "account",
            'action' => "txlistinternal",
            'txhash' => $transactionHash
        ]);
    }

    /**
     * Get "Internal Transactions" by Block Range
     *
     * @param int $startBlock Starting blockNo to retrieve results
     * @param int $endBlock Ending blockNo to retrieve results
     * @param string $sort 'asc' or 'desc'
     * @param int $page Page number
     * @param int $offset Offset
     *
     * @return array
     * @throws ErrorException
     */
    public function transactionListInternalByBlockRange($startBlock = 0, $endBlock = 99999999, $sort = "asc", $page = null, $offset = null)
    {
        $params = [
            'module' => "account",
            'action' => "txlistinternal",
            'startblock' => $startBlock,
            'endblock' => $endBlock,
            'sort' => $sort
        ];

        if (!is_null($page)) {
            $params['page'] = (int)$page;
        }

        if (!is_null($offset)) {
            $params['offset'] = (int)$offset;
        }

        return $this->request->exec($params);
    }

    /**
     * Get list of Blocks Mined by Address.
     *
     * @param string $address Ether address
     * @param string $blockType "blocks" or "uncles"
     * @param int $page Page number
     * @param int $offset Offset
     *
     * @return array
     * @throws ErrorException
     */
    public function getMinedBlocks($address, $blockType = APIConf::BLOCK_TYPE_BLOCKS, $page = null, $offset = null)
    {
        if (!in_array($blockType, APIConf::$blockTypes)) {
            throw new ErrorException("Invalid block type");
        }

        $params = [
            'module' => "account",
            'action' => "getminedblocks",
            'address' => $address,
            'blocktype' => $blockType,
        ];

        if (!is_null($page)) {
            $params['page'] = (int)$page;
        }

        if (!is_null($offset)) {
            $params['offset'] = (int)$offset;
        }

        return $this->request->exec($params);
    }


    /**
     * Get Token Account Balance by known TokenName (Supported TokenNames: DGD,
     * MKR, FirstBlood, HackerGold, ICONOMI, Pluton, REP, SNGLS).
     *
     * or
     *
     * for TokenContractAddress.
     *
     * @param string $tokenIdentifier Token name from the list or contract address.
     * @param string $address Ether address.
     * @param string $tag
     *
     * @return array
     * @throws ErrorException
     *
     * @deprecated deprecated since version 1.0.1
     */
    public function tokenBalance($tokenIdentifier, $address, $tag = APIConf::TAG_LATEST)
    {
        $params = [
            'module' => "account",
            'action' => "tokenbalance",
            'address' => $address,
            'tag' => $tag
        ];

        if (strlen($tokenIdentifier) === 42) {
            $params['contractaddress'] = $tokenIdentifier;
        } else {
            $params['tokenname'] = $tokenIdentifier;
        }

        return $this->request->exec($params);
    }

    /**
     * Get Historical Ether Balance for a Single Address By BlockNo
     *
     * @param string $address the string representing the address to check for balance
     * @param string $blockNumber the integer block number to check balance for eg. 12697906​
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getBalanceHistory($address, $blockNumber) {
        return $this->request->exec([
            'module' => "account",
            'action' => "balancehistory",
            'address' => $address,
            'blockno' => $blockNumber
        ]);
    }
}
