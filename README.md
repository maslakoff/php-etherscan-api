# EtherScan PHP API

PHP wrapper for the EtherScan API

[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)

[Official API Documentation](https://docs.etherscan.io)

[Create API Key (optional)](https://etherscan.io/myapikey)

## Requirements

The minimum requirement by EtherScan API is that your Web server supports PHP 5.6.

## Installation

To install EtherScan PHP API package you can run command:

```
composer require maslakoff/php-etherscan-api:dev-master
```

## Usage

Mainnet

```php
$client = new \Etherscan\Client('Y3U3GMFC8P545CFWRU4TET8MY1K79YDZ3V');
$client->api('account')->balance('0x43406D1baAE11a950DE734DAE4079A3C9Eb48DAf');
```

## For testnet usage

Supported:

-   goerli
-   ropsten
-   kovan
-   rinkeby

```php
$client = new \Etherscan\Client('Y3U3GMFC8P545CFWRU4TET8MY1K79YDZ3V', EtherscanAPIConf::TESTNET_RINKEBY);
$client->api('account')->balance('0x43406D1baAE11a950DE734DAE4079A3C9Eb48DAf');
```


## For Binance Smart Chain (BSC) usage

In order to query the BSC you need a different API. You can obtain it here: https://bscscan.com/apis.
Here the call:

```php
$bsc_client = new \Etherscan\Client('Y3U3GMFC8P545CFWRU4TET8MY1K79YDZ3V', EtherscanAPIConf::NET_BSC);
$bsc_client->api('account')->balance('0x43406D1baAE11a950DE734DAE4079A3C9Eb48DAf');
```
