<?php

namespace Etherscan\Api;

/**
 * Class Block
 * @package Etherscan\Api
 */
class Block extends AbstractApi
{
    /**
     * Get Block And Uncle Rewards by BlockNo.
     *
     * @param int $blockNumber block number to check block rewards
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getBlockReward($blockNumber)
    {
        return $this->request->exec([
            'module' => "block",
            'action' => "getblockreward",
            'blockno' => $blockNumber
        ]);
    }

    /**
     * Get Estimated Block Countdown Time by BlockNo.
     *
     * @param int $blockNumber block number to estimate time remaining to be mined
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getBlockCountdown($blockNumber)
    {
        return $this->request->exec([
            'module' => "block",
            'action' => "getblockcountdown",
            'blockno' => $blockNumber
        ]);
    }

    /**
     * Get Block Number by Timestamp
     *
     * @param int $timestamp Unix timestamp in seconds
     * @param string $closest the closest available block to the provided timestamp
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getBlockNumberByTimestamp($timestamp, $closest)
    {
        return $this->request->exec([
            'module' => "block",
            'action' => "getblocknobytime",
            'timestamp' => $timestamp,
            'closest' => $closest
        ]);
    }

    /**
     * Get Daily Average Block Size
     *
     * @param string $startdate the starting date in yyyy-MM-dd format, eg. 2019-02-01
     * @param string $enddate the ending date in yyyy-MM-dd format, eg. 2019-02-28
     * @param string $sort 'asc' or 'desc'
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getDailyAverageBlockSize($startdate, $enddate, $sort = "asc")
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "dailyavgblocksize",
            'startdate' => $startdate,
            'enddate' => $enddate,
            'sort' => $sort
        ]);
    }

    /**
     * Get Daily Block Count and Rewards
     *
     * @param string $startdate the starting date in yyyy-MM-dd format, eg. 2019-02-01
     * @param string $enddate the ending date in yyyy-MM-dd format, eg. 2019-02-28
     * @param string $sort 'asc' or 'desc'
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getDailyBlockCountAndRewards($startdate, $enddate, $sort = "asc")
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "dailyblkcount",
            'startdate' => $startdate,
            'enddate' => $enddate,
            'sort' => $sort
        ]);
    }

    /**
     * Get Daily Block Rewards
     *
     * @param string $startdate the starting date in yyyy-MM-dd format, eg. 2019-02-01
     * @param string $enddate the ending date in yyyy-MM-dd format, eg. 2019-02-28
     * @param string $sort 'asc' or 'desc'
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getDailyBlockRewards($startdate, $enddate, $sort = "asc")
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "dailyblockrewards",
            'startdate' => $startdate,
            'enddate' => $enddate,
            'sort' => $sort
        ]);
    }

    /**
     * Get Daily Average Time for A Block to be Included in the Ethereum Blockchain
     *
     * @param string $startdate the starting date in yyyy-MM-dd format, eg. 2019-02-01
     * @param string $enddate the ending date in yyyy-MM-dd format, eg. 2019-02-28
     * @param string $sort 'asc' or 'desc'
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getDailyAverageBlockTime($startdate, $enddate, $sort = "asc")
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "dailyavgblocktime",
            'startdate' => $startdate,
            'enddate' => $enddate,
            'sort' => $sort
        ]);
    }

    /**
     * Get Daily Uncle Block Count and Rewards
     *
     * @param string $startdate the starting date in yyyy-MM-dd format, eg. 2019-02-01
     * @param string $enddate the ending date in yyyy-MM-dd format, eg. 2019-02-28
     * @param string $sort 'asc' or 'desc'
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getDailyUncleBlockCountAndRewards($startdate, $enddate, $sort = "asc")
    {
        return $this->request->exec([
            'module' => "stats",
            'action' => "dailyuncleblkcount",
            'startdate' => $startdate,
            'enddate' => $enddate,
            'sort' => $sort
        ]);
    }
}
