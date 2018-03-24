<?php

namespace Etherscan\Api;

use Etherscan\APIConf;

/**
 * Class EventLog
 * @package Etherscan\Api
 * @author Maslakou Ihar <igormaslakoff@gmail.com>
 */
class EventLog extends AbstractApi
{

    /**
     * Get Event Logs
     *
     * @param $address
     * @param $topic
     * @param int $startBlock
     * @param string $endBlock
     * @return mixed
     * @throws \Etherscan\Exception\ErrorException
     */
    public function getLogs($address, $topic, $startBlock = 0, $endBlock = APIConf::TAG_LATEST)
    {
        $params = [
            'module' => 'logs',
            'action' => 'getLogs',
            'fromBlock' => $startBlock,
            'toBlock' => $endBlock,
            'address' => $address,
            'topic0' => $topic,
        ];

        return $this->request->exec($params);
    }
}