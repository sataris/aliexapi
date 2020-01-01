<?php

namespace AliexApi\Tests;

use AliexApi\Configuration\GenericConfiguration;
use AliexApi\Request\Rest\Request;
use AliexApi\Request\RequestFactory;
use PHPUnit\Framework\TestCase;

class RequestFactoryTest extends TestCase
{

    public function testRequestFactory()
    {
        $configuration = new GenericConfiguration();
        $configuration->setApiKey('12345')
            ->setTrackingKey('trackkey')
            ->setDigitalSign('dummydigitalsign')
            ->setRequest(new Request());
        $request = RequestFactory::createRequest($configuration);
        $reflectionClass = new \ReflectionClass($request);
        $property = $reflectionClass->getProperty('configuration');
        $property->setAccessible(true);
        $this->assertSame($configuration, $property->getValue($request));
    }
}
