<?php
require_once('BasesfEbay.class.php');
require_once('sfEbay.class.php');
require_once('sfEbayShopping.class.php');
require_once('sfEbayAuth.class.php');
require_once('sfEbayCredentials.class.php');

$token = 'AgAAAA**AQAAAA**aAAAAA**cT8ORw**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wGkoOoCZGHpgydj6x9nY+seQ**tUYAAA**AAMAAA**K8IsIhUPXUKtlnXDBQAs4ygyinUqcmN0RMw+lyUkYX1j8O4PnI7SxnigDWFsxpH9Ro7kUILOC2aoElr3NFdIn8yFMs5IHM0N6isYa4qAR+SIBAeSTfDi7QOlIzUngY5nPjcFTUXWvGXuUamrShjz2+qcIFEaeODy0vYZzWAPjJVmBnc2YSw2YfJ0MvDz5qYsGNIrnRLPyNWIXTh2NsuQy5PdHEZF8D3lAL9cX4iDYKFJDEqV05ae2AFJp2R+BtFdfRdt8yFYTmQZYfgHFArpxZZRaEvLI5znN7DFeRhFNys0v/JPpqdJLy2kPkiHk09v8G510cWelkN8YtZYzOOxANfUb4zHP3fN5KlH21F/1Yu0LkczkqG26jNAWut7Tcht1NpqTfBBrmlefJ4NgfctMEqSUf7RuuDece6eWZAKYjYY02iyvsskYE3+PVoqCVywXmIAm9i0vsdeKyGc9W+dzbyOsC1wyCR+eQ/3cnd9v+bQuOlbmVFQMhGQgJZ4Z31cE7D8v215c+D3hYkZ1nN+G9kNCRwQ8v6AnO4V/nfoQKdX1xVjqnJS+cig5nJ1RSdtMF+9x+n7K86HZNxla46D/UIqwQcHVH6gzYU7WNUIq078kNeIb/pkh3LUbQQdXSZZsRRLhj6USgI+JqRWGMBPWpU70HphPfQpHHACd4LBzXqwA/967TLZ8Ac1LqydWL79VOT/pKjlQ26PP5VFHO+CDIv0goqPA/xbLJcE0SZjRBmInhT1xilK23pjKljBuze3';
$devId = '5ecef958-bd27-4c9c-82a3-15bb84728d6f';
$appId = 'Jonathan-8990-4cf3-988d-121fde95d905';
$certId = '800db611-09e4-4ac8-b88b-b631310c4655';

//$session = new eBaySession($devId, $appId, $certId);
//$session->token = $token;
//$session->site = 0;
//$session->location = 'https://api.ebay.com/wsapi';

$client = new sfEbayShopping($token, $devId, $appId, $certId);

$params = array('QueryKeywords' => 'harry potter');

$results = $client->FindHalfProducts($params);

print_r($results);