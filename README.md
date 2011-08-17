PHP Etherpad Lite client
========================

The Etherpad Lite API is not yet finalized, so expect things to
change! This client will be updated with the current API Draft as
shown in the
[Etherpad Lite Wiki](https://github.com/Pita/etherpad-lite/wiki/HTTP-API).

Requirements
------------
PHP with support for cURL.

Usage examples
--------------

The only thing you need to get started is the API key, it can be found
in the root folder of your Etherpad Lite deployment (the file is named
APIKEY.txt).

    $eplite = new EtherpadLiteClient;
    $eplite->setParams("yourapikeyhere", "http://epliteexample.com/api", 1);
    $reply = $eplite->createPad("padname", "In ur pad, writing ur txts");
    print $eplite->getText("padname");
