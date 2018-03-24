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
    public function getBlockReward($blockNumber) {
        return $this->request->exec([
            'module' => "block",
            'action' => "getblockreward",
            'blockno' => $blockNumber
        ]);
    }
}