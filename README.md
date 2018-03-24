# EtherScan PHP API
PHP wrapper for the EtherScan API

[Official API Documentation](https://etherscan.io/apis)

[Create API Key (optional)](https://etherscan.io/myapikey)

Requirements
------------
The minimum requirement by EtherScan API is that your Web server supports PHP 5.6.

Installation
------------
To install EtherScan PHP API package you can run command:

```
composer require maslakoff/php-etherscan-api:dev-master
```

Usage
-----
Mainnet

```php
$client = new \Etherscan\Client('Y3U3GMFC8P545CFWRU4TET8MY1K79YDZ3V');
$client->api('account')->balance('0x43406D1baAE11a950DE734DAE4079A3C9Eb48DAf');
```


## For testnet usage

Supported:

* ropsten
* kovan
* rinkeby


```php
$client = new \Etherscan\Client('Y3U3GMFC8P545CFWRU4TET8MY1K79YDZ3V', EtherscanAPIConf::TESTNET_RINKEBY);
$client->api('account')->balance('0x43406D1baAE11a950DE734DAE4079A3C9Eb48DAf');
```
