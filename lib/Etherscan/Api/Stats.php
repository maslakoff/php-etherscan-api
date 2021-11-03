<?php

namespace Etherscan\Api;

use Etherscan\APIConf;
use Etherscan\Exception\ErrorException;
use Etherscan\Exception\InvalidArgumentException;

/**
 * Class Stats
 * @package Etherscan\Api
 * @author Maslakou Ihar <igormaslakoff@gmail.com>
 */
class Stats extends AbstractApi
{
    /**
     * Get Total Supply of Ether.
     * Returns the current amount of Ether in circulation.
     *
     * @return array Result returned in Wei, to get value in Ether divide resultAbove / 1000000000000000000
     * @throws \Etherscan\Exception\ErrorException
     */
    public function ethSupply()
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "ethsupply",
        ]);
    }
    /**
     * Get Total Supply of Ether 2
     * Returns the current amount of Ether in circulation, ETH2 Staking rewards and EIP1559 burnt fees statistics.
     *
     * @return array Result returned in Wei, to get value in Ether divide resultAbove / 1000000000000000000
     * @throws \Etherscan\Exception\ErrorException
     */
    public function eth2Supply()
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "ethsupply2",
        ]);
    }

    /**
     * Get Ether LastPrice Price.
     * Returns the latest price of 1 ETH.
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function ethPrice()
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "ethprice",
        ]);
    }

    /**
     * Get Ethereum Nodes Size
     * Returns the size of the Ethereum blockchain, in bytes, over a date range.
     *
     * @param string $startdate the starting date in yyyy-MM-dd format, eg. 2019-02-01
     * @param string $enddate the ending date in yyyy-MM-dd format, eg. 2019-02-28
     * @param string $clienttype the Ethereum node client to use, either geth or parity
     * @param string $syncmode the type of node to run, either default or archive
     * @param string $sort 'asc' or 'desc'
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     * @throws \Etherscan\Exception\InvalidArgumentException
     */
    public function getNodesSize($startdate, $enddate, $clienttype, $syncmode, $sort = "asc")
    {
        if (!in_array($clienttype, APIConf::$clientTypes)) {
            throw new InvalidArgumentException("Invalid client type");
        }

        if (!in_array($syncmode, APIConf::$syncModes)) {
            throw new InvalidArgumentException("Invalid sync mode type");
        }

        return $this->request->exec([
            'module' => "stats",
            'action' => "chainsize",
            'startdate' => $startdate,
            'enddate' => $enddate,
            'clienttype' => $clienttype,
            'syncmode' => $syncmode,
            'sort' => $sort
        ]);
    }

    /**
     * Get Total Nodes Count
     * Returns the total number of discoverable Ethereum nodes.
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getNodesCount()
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "nodecount",
        ]);
    }

    /**
     * Get Daily Network Transaction Fee
     * Returns the amount of transaction fees paid to miners per day.
     *
     * @param string $startdate the starting date in yyyy-MM-dd format, eg. 2019-02-01
     * @param string $enddate the ending date in yyyy-MM-dd format, eg. 2019-02-28
     * @param string $sort 'asc' or 'desc'
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getDailyTransactionFee($startdate, $enddate, $sort = "asc")
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "dailytxnfee",
            'startdate' => $startdate,
            'enddate' => $enddate,
            'sort' => $sort
        ]);
    }

    /**
     * Get Daily New Address Count
     * Returns the number of new Ethereum addresses created per day.
     *
     * @param string $startdate the starting date in yyyy-MM-dd format, eg. 2019-02-01
     * @param string $enddate the ending date in yyyy-MM-dd format, eg. 2019-02-28
     * @param string $sort 'asc' or 'desc'
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getDailyNewAddressCount($startdate, $enddate, $sort = "asc")
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "dailynewaddress",
            'startdate' => $startdate,
            'enddate' => $enddate,
            'sort' => $sort
        ]);
    }

    /**
     * Get Daily Network Utilization
     * Returns the daily average gas used over gas limit, in percentage.
     *
     * @param string $startdate the starting date in yyyy-MM-dd format, eg. 2019-02-01
     * @param string $enddate the ending date in yyyy-MM-dd format, eg. 2019-02-28
     * @param string $sort 'asc' or 'desc'
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getDailyNetworkUtilization($startdate, $enddate, $sort = "asc")
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "dailynetutilization",
            'startdate' => $startdate,
            'enddate' => $enddate,
            'sort' => $sort
        ]);
    }

    /**
     * Get Daily Average Network Hash Rate
     * Returns the historical measure of processing power of the Ethereum network.
     *
     * @param string $startdate the starting date in yyyy-MM-dd format, eg. 2019-02-01
     * @param string $enddate the ending date in yyyy-MM-dd format, eg. 2019-02-28
     * @param string $sort 'asc' or 'desc'
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getDailyAverageHashRate($startdate, $enddate, $sort = "asc")
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "dailyavghashrate",
            'startdate' => $startdate,
            'enddate' => $enddate,
            'sort' => $sort
        ]);
    }

    /**
     * Get Daily Transaction Count
     * Returns the number of transactions performed on the Ethereum blockchain per day.
     *
     * @param string $startdate the starting date in yyyy-MM-dd format, eg. 2019-02-01
     * @param string $enddate the ending date in yyyy-MM-dd format, eg. 2019-02-28
     * @param string $sort 'asc' or 'desc'
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getDailyTransactionCount($startdate, $enddate, $sort = "asc")
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "dailytx",
            'startdate' => $startdate,
            'enddate' => $enddate,
            'sort' => $sort
        ]);
    }

    /**
     * Get Daily Average Network Difficulty
     * Returns the historical mining difficulty of the Ethereum network.
     *
     * @param string $startdate the starting date in yyyy-MM-dd format, eg. 2019-02-01
     * @param string $enddate the ending date in yyyy-MM-dd format, eg. 2019-02-28
     * @param string $sort 'asc' or 'desc'
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getDailyAverageNetworkDifficulty($startdate, $enddate, $sort = "asc")
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "dailyavgnetdifficulty",
            'startdate' => $startdate,
            'enddate' => $enddate,
            'sort' => $sort
        ]);
    }

    /**
     * Get Ether Historical Daily Market Cap
     * Returns the historical Ether daily market capitalization.
     *
     * @param string $startdate the starting date in yyyy-MM-dd format, eg. 2019-02-01
     * @param string $enddate the ending date in yyyy-MM-dd format, eg. 2019-02-28
     * @param string $sort 'asc' or 'desc'
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getDailyMarketCap($startdate, $enddate, $sort = "asc")
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "ethdailymarketcap",
            'startdate' => $startdate,
            'enddate' => $enddate,
            'sort' => $sort
        ]);
    }

    /**
     * Get Ether Historical Price
     * Returns the historical price of 1 ETH.
     *
     * @param string $startdate the starting date in yyyy-MM-dd format, eg. 2019-02-01
     * @param string $enddate the ending date in yyyy-MM-dd format, eg. 2019-02-28
     * @param string $sort 'asc' or 'desc'
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getHistoricalPrice($startdate, $enddate, $sort = "asc")
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "ethdailyprice",
            'startdate' => $startdate,
            'enddate' => $enddate,
            'sort' => $sort
        ]);
    }

    /**
     * Get Token TotalSupply by TokenName (Supported TokenNames: DGD, MKR,
     * FirstBlood, HackerGold, ICONOMI, Pluton, REP, SNGLS).
     *
     * or
     *
     * by ContractAddress.
     *
     * @param string $tokenIdentifier Token name from the list or contract address.
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function tokenSupply($tokenIdentifier)
    {
        $params = [
            'module' => "stats",
            'action' => "tokensupply",
        ];

        if (strlen($tokenIdentifier) === 42) {
            $params['contractaddress'] = $tokenIdentifier;
        } else {
            $params['tokenname'] = $tokenIdentifier;
        }

        return $this->request->exec($params);
    }
}
