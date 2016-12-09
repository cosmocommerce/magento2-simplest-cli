1 unzip in app/code/CosmoCommerce/Cli

2 run: php ./bin/magento module:enable CosmoCommerce_Cli

3 run: php ./bin/magento setup:upgrade

4 run: php ./bin/magento cosmocommerce:cli:test [-t|--option_name] argument_name
