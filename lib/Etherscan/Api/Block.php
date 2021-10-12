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
     * @param int $blockNumber
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
     * @param int $blockNumber
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
     * @param int $timestamp
     * @param string $closest
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
}
