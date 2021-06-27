<?php

namespace Etherscan\Api;


use Etherscan\APIConf;
use Etherscan\Exception\ErrorException;

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
    public function balanceMulti($addresses, $tag = APIConf::TAG_LATEST) {
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
    public function transactionListByAddress($address, $startBlock = 0, $endBlock = 99999999, $sort = "asc", $page = null, $offset = null) {
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
    public function transactionListInternalByAddress($address, $startBlock = 0, $endBlock = 99999999, $sort = "asc", $page = null, $offset = null) {
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
     * Get "Internal Transactions" by Transaction Hash.
     *
     * @param string $transactionHash
     *
     * @return array
     * @throws ErrorException
     */
    public function transactionListInternalByHash($transactionHash) {
        return $this->request->exec([
            'module' => "account",
            'action' => "txlistinternal",
            'txhash' => $transactionHash
        ]);
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
    public function getMinedBlocks($address, $blockType = APIConf::BLOCK_TYPE_BLOCKS, $page = null, $offset = null) {
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
     */
    public function tokenBalance($tokenIdentifier, $address, $tag = APIConf::TAG_LATEST) {
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
}
