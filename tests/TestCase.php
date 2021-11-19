<?php

declare(strict_types=1);

namespace Tests;

/**
 * A base class for all tests.
 *
 * @package Tests
 */
abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected $mqttBrokerHost;
    protected $mqttBrokerPort;
    protected $mqttBrokerTlsPort;
    protected $mqttBrokerTlsWithClientCertificatePort;

    protected $skipTlsTests;
    protected $tlsCertificateDirectory;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->mqttBrokerHost                         = getenv('MQTT_BROKER_HOST');
        $this->mqttBrokerPort                         = intval(getenv('MQTT_BROKER_PORT'));
        $this->mqttBrokerTlsPort                      = intval(getenv('MQTT_BROKER_TLS_PORT'));
        $this->mqttBrokerTlsWithClientCertificatePort = intval(getenv('MQTT_BROKER_TLS_WITH_CLIENT_CERT_PORT'));

        $this->skipTlsTests            = getenv('SKIP_TLS_TESTS') === 'true';
        $this->tlsCertificateDirectory = rtrim(getenv('TLS_CERT_DIR'), '/');
    }
}
