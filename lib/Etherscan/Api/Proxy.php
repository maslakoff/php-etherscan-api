<?php

namespace Etherscan\Api;

use Etherscan\APIConf;
use Etherscan\Exception\ErrorException;

/**
 * Class Proxy
 * @package Etherscan\Api
 * @author Maslakou Ihar <igormaslakoff@gmail.com>
 */
class Proxy extends AbstractApi
{

    /**
     * Returns the number of most recent block
     *
     * @return array
     * @throws ErrorException
     */
    public function blockNumber()
    {
        return $this->request->exec([
            'module' => "proxy",
            'action' => "eth_blockNumber",
        ]);
    }
    
    /**
     * Returns information about a block by block number
     *
     * @param string $tag
     * @param booelan $full_transaction
     * 
     * @return array
     * @throws ErrorException
     */
    public function getBlockByNumber($tag = APIConf::TAG_LATEST, bool $full_transaction)
    {
        return $this->request->exec([
            'module' => "proxy",
            'action' => "eth_getBlockByNumber",
            'tag' => $tag,
            'boolean' => $full_transaction
        ]);
    }
    
    /**
     * Returns the information about a transaction requested by transaction hash
     *
     * @param string $transactionHash
     * 
     * @return array
     * @throws ErrorException
     */
    public function getTransactionByHash($transactionHash)
    {
        return $this->request->exec([
            'module' => "proxy",
            'action' => "eth_getTransactionByHash",
            'txhash' => $transactionHash
        ]);
    }

    /**
     * Returns the number of transactions sent from an address
     *
     * @param string $address Ether address.
     * @param string $tag
     * 
     * @return array
     * @throws ErrorException
     */
    public function getTransactionCount(string $address, $tag = APIConf::TAG_LATEST)
    {
        return $this->request->exec([
            'module' => "proxy",
            'action' => "eth_getTransactionCount",
            'tag' => $tag,
            'address' => $address
        ]);
    }

    /**
     * Creates new message call transaction or a contract creation for signed transactions
     *
     * @param string $hex raw transaction.
     * 
     * @return array
     * @throws ErrorException
     */
    public function sendRawTransaction($hex)
    {
        return $this->request->exec([
            'module' => "proxy",
            'action' => "eth_sendRawTransaction",
            'hex' => $hex
        ]);
    }

    /**
     * Returns the receipt of a transaction by transaction hash
     *
     * @param string $transactionHash
     * 
     * @return array
     * @throws ErrorException
     */
    public function getTransactionReceipt($transactionHash)
    {
        return $this->request->exec([
            'module' => "proxy",
            'action' => "eth_getTransactionReceipt",
            'txhash' => $transactionHash
        ]);
    }

    /**
     * Returns the number of most recent block
     *
     * @return array
     * @throws ErrorException
     */
    public function gasPrice()
    {
        return $this->request->exec([
            'module' => "proxy",
            'action' => "eth_gasPrice",
        ]);
    }

    /**
     * Makes a call or transaction, which won't be added to the blockchain and returns
     * the used gas, which can be used for estimating the used gas
     *
     * @param string $to 20 Bytes - The address the transaction is directed to.
     * @param string $value (optional) Integer of the value sent with this transaction
     * @param string $gasPrice (optional) Integer of the gasPrice used for each paid gas
     * @param string $gas (optional) Integer of the gas provided for the transaction execution.
     *                  eth_call consumes zero gas, but this parameter may be needed by some
     *                  executions.
     * 
     * @return array
     * @throws ErrorException
     */
    public function estimateGas($to=null, $value=null, $gasPrice=null, $gas=null)
    {
        return $this->request->exec([
            'module' => "proxy",
            'action' => "eth_estimateGas",
            'to' => $to,
            'value' => $value,
            'gasPrice' => $gasPrice,
            'gas' => $gas
        ]);
    }
}
