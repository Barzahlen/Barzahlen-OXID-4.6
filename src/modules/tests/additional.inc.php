<?php
// including vfsStream library
require_once dirname( __FILE__ ) . "/libs/vfsStream/vfsStream.php";

// wheter to use the original "aModules" chain from the shop
// methods like "initFromMetadata" and "addChain" will append data to the original chain
oxTestModuleLoader::useOriginalChain( false );

// initiates the module from the metadata file
// does nothing if metadata file is not found
oxTestModuleLoader::initFromMetadata();

// appends the module extension chain with the given module files
oxTestModuleLoader::append( array(
    //"oxarticle" => "vendor/mymodule/core/myarticle.php",
));

require_once getShopBasePath().'/modules/barzahlen/api/loader.php';

define('SHOPID', '10483');
define('PAYMENTKEY', 'de74310368a4718a48e0e244fbf3e22e2ae117f2');
define('NOTIFICATIONKEY', 'e5354004de1001f86004090d01982a6e05da1c12');