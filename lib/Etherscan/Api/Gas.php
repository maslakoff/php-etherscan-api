<?php

namespace Etherscan\Api;

use Etherscan\APIConf;

/**
 * Class Gas
 * @package Etherscan\Api
 * @author Maslakou Ihar <igormaslakoff@gmail.com>
 */
class Gas extends AbstractApi
{

    /**
     * Get Estimation of Confirmation Time
     * Returns the estimated time, in seconds, for a transaction to be confirmed on the blockchain.
     *
     * @param $gasPrice the price paid per unit of gas, in wei
     *
     * @return mixed
     * @throws \Etherscan\Exception\ErrorException
     */
    public function gasEstimate($gasPrice)
    {
        $params = [
            'module' => 'gastracker',
            'action' => 'gasestimate',
            'gasprice' => $gasPrice,
        ];

        return $this->request->exec($params);
    }

    /**
     * Get Gas Oracle
     * Returns the current Safe, Proposed and Fast gas prices.
     *
     * @return mixed
     * @throws \Etherscan\Exception\ErrorException
     */
    public function gasOracle()
    {
        $params = [
            'module' => 'gastracker',
            'action' => 'gasoracle',
        ];

        return $this->request->exec($params);
    }

    /**
     * Get Daily Average Gas Limit
     * Returns the historical daily average gas limit of the Ethereum network.
     *
     * @param string $startdate the starting date in yyyy-MM-dd format, eg. 2019-02-01
     * @param string $enddate the ending date in yyyy-MM-dd format, eg. 2019-02-28
     * @param string $sort 'asc' or 'desc'
     *
     * @return mixed
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getDailyAverageGasLimit($startdate, $enddate, $sort = "asc")
    {
        $params = [
            'module' => 'stats',
            'action' => 'dailyavggaslimit',
            'startdate' => $startdate,
            'enddate' => $enddate,
            'sort' => $sort
        ];

        return $this->request->exec($params);
    }

    /**
     * Get Ethereum Daily Total Gas Used
     * Returns the total amount of gas used daily for transctions on the Ethereum network.
     *
     * @param string $startdate the starting date in yyyy-MM-dd format, eg. 2019-02-01
     * @param string $enddate the ending date in yyyy-MM-dd format, eg. 2019-02-28
     * @param string $sort 'asc' or 'desc'
     *
     * @return mixed
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getDailyTotalGasUsed($startdate, $enddate, $sort = "asc")
    {
        $params = [
            'module' => 'stats',
            'action' => 'dailygasused',
            'startdate' => $startdate,
            'enddate' => $enddate,
            'sort' => $sort
        ];

        return $this->request->exec($params);
    }

    /**
     * Get Daily Average Gas Price
     * Returns the daily average gas price used on the Ethereum network.
     *
     * @param string $startdate the starting date in yyyy-MM-dd format, eg. 2019-02-01
     * @param string $enddate the ending date in yyyy-MM-dd format, eg. 2019-02-28
     * @param string $sort 'asc' or 'desc'
     *
     * @return mixed
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getDailyAverageGasPrice($startdate, $enddate, $sort = "asc")
    {
        $params = [
            'module' => 'stats',
            'action' => 'dailyavggasprice',
            'startdate' => $startdate,
            'enddate' => $enddate,
            'sort' => $sort
        ];

        return $this->request->exec($params);
    }
}
