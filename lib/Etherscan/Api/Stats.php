<?php

namespace Etherscan\Api;

/**
 * Class Stats
 * @package Etherscan\Api
 * @author Maslakou Ihar <igormaslakoff@gmail.com>
 */
class Stats extends AbstractApi
{

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
    public function tokenSupply($tokenIdentifier) {
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

    /**
     * Get Total Supply of Ether.
     *
     * @return array Result returned in Wei, to get value in Ether divide resultAbove / 1000000000000000000
     * @throws \Etherscan\Exception\ErrorException
     */
    public function ethSupply() {
        return $this->request->exec([
            'module' => "stats",
            'action' => "ethsupply",
        ]);
    }

    /**
     * Get Ether LastPrice Price.
     *
     * @return array
     * @throws \Etherscan\Exception\ErrorException
     */
    public function ethPrice() {
        return $this->request->exec([
            'module' => "stats",
            'action' => "ethprice",
        ]);
    }
}