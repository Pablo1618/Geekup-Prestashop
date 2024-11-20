<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('en-US', array (
));

$catalogueEn = new MessageCatalogue('en', array (
));
$catalogue->addFallbackCatalogue($catalogueEn);

return $catalogue;
