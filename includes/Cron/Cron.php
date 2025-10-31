<?php

namespace Papaki\SkroutzBestPriceXMLFeed\Cron;

use Papaki\SkroutzBestPriceXMLFeed\Plugin;
use Papaki\SkroutzBestPriceXMLFeed\Traits\Singleton;
use Papaki\SkroutzBestPriceXMLFeed\Cron\Crons\GenerateXMLFeedsCron;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Cron {
    use Singleton;

    public function init(): void {
        GenerateXMLFeedsCron::register();

        register_activation_hook( Plugin::file(), [ GenerateXMLFeedsCron::class, 'schedule' ] );
        register_deactivation_hook( Plugin::file(), [ GenerateXMLFeedsCron::class, 'unschedule' ] );
    }
}
