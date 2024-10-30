<?php

namespace ps_metrics_module_v4_0_8\PrestaShop\PsAccountsInstaller\Tests;

use ps_metrics_module_v4_0_8\Faker\Generator;
class TestCase extends \ps_metrics_module_v4_0_8\PHPUnit\Framework\TestCase
{
    /**
     * @var Generator
     */
    public $faker;
    /**
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();
        $this->faker = \ps_metrics_module_v4_0_8\Faker\Factory::create();
    }
}
