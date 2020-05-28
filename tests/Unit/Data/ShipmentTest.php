<?php

namespace Smartsendio\Api\Tests\Unit\Data;

use PHPUnit\Framework\TestCase;
use Smartsendio\Api\Data\Agent;
use Smartsendio\Api\Data\Parcel;
use Smartsendio\Api\Data\Receiver;
use Smartsendio\Api\Data\Sender;
use Smartsendio\Api\Data\Services;
use Smartsendio\Api\Data\Shipment;

class ShipmentTest extends TestCase
{
    /** @var Shipment */
    protected $shipment;

    public function setUp(): void
    {
        $this->shipment = new Shipment();
    }

    /** @test */
    public function testSetInternalId()
    {
        $this->shipment->setInternalId('test-id-123');

        $this->assertEquals('test-id-123', $this->shipment->internal_id);
    }

    /** @test */
    public function testSetInternalReference()
    {
        $this->shipment->setInternalReference('test-id-ABC');

        $this->assertEquals('test-id-ABC', $this->shipment->internal_reference);
    }

    /** @test */
    public function testSetShippingCarrier()
    {
        $this->shipment->setShippingCarrier('royalmail');

        $this->assertEquals('royalmail', $this->shipment->shipping_carrier);
    }

    /** @test */
    public function testSetShippingMethod()
    {
        $this->shipment->setShippingMethod('testmethod');

        $this->assertEquals('testmethod', $this->shipment->shipping_method);
    }

    /** @test */
    public function testSetShippingDate()
    {
        $this->shipment->setInternalId('2019-02-03');

        $this->assertEquals('2019-02-03', $this->shipment->internal_id);
    }

    /** @test */
    public function testSetSubtotalPriceExcludingTax()
    {
        $this->shipment->setSubtotalPriceExcludingTax(12.3);

        $this->assertEquals(12.3, $this->shipment->subtotal_price_excluding_tax);
    }

    /** @test */
    public function testSetSubtotalPriceIncludingTax()
    {
        $this->shipment->setSubtotalPriceIncludingTax(15.8);

        $this->assertEquals(15.8, $this->shipment->subtotal_price_including_tax);
    }

    /** @test */
    public function testSetShippingPriceExcludingTax()
    {
        $this->shipment->setShippingPriceExcludingTax(2.35);

        $this->assertEquals(2.35, $this->shipment->shipping_price_excluding_tax);
    }

    /** @test */
    public function testSetShippingPriceIncludingTax()
    {
        $this->shipment->setShippingPriceIncludingTax(4.55);

        $this->assertEquals(4.55, $this->shipment->shipping_price_including_tax);
    }

    /** @test */
    public function testSetTotalPriceExcludingTax()
    {
        $this->shipment->setTotalPriceExcludingTax(25.67);

        $this->assertEquals(25.67, $this->shipment->total_price_excluding_tax);
    }

    /** @test */
    public function testSetTotalPriceIncludingTax()
    {
        $this->shipment->setTotalPriceIncludingTax(29.99);

        $this->assertEquals(29.99, $this->shipment->total_price_including_tax);
    }

    /** @test */
    public function testSetTotalTaxAmount()
    {
        $this->shipment->setTotalTaxAmount(2.34);

        $this->assertEquals(2.34, $this->shipment->total_tax_amount);
    }

    /** @test */
    public function testSetCurrency()
    {
        $this->shipment->setCurrency('EUR');

        $this->assertEquals('EUR', $this->shipment->currency);
    }

    /** @test */
    public function testSetReceiver()
    {
        $receiver = new Receiver();
        $this->shipment->setReceiver($receiver);

        $this->assertSame($receiver, $this->shipment->receiver);
    }

    /** @test */
    public function testSetSender()
    {
        $sender = new Sender();
        $this->shipment->setSender($sender);

        $this->assertSame($sender, $this->shipment->sender);
    }

    /** @test */
    public function testSetAgent()
    {
        $agent = new Agent();
        $this->shipment->setAgent($agent);

        $this->assertSame($agent, $this->shipment->agent);
    }

    /** @test */
    public function testSetParcels()
    {
        $parcel1 = new Parcel();
        $parcel2 = new Parcel();

        $this->shipment->setParcels([$parcel1, $parcel2]);

        $this->assertIsArray($this->shipment->parcels);
        $this->assertCount(2, $this->shipment->parcels);
        $this->assertContainsOnlyInstancesOf(Parcel::class, $this->shipment->parcels);
        $this->assertSame($parcel1, $this->shipment->parcels[0]);
        $this->assertSame($parcel2, $this->shipment->parcels[1]);
    }

    /** @test */
    public function testAddParcel()
    {
        $parcel1 = new Parcel();
        $parcel2 = new Parcel();
        $this->shipment->addParcel($parcel1)->addParcel($parcel2);

        $this->assertIsArray($this->shipment->parcels);
        $this->assertCount(2, $this->shipment->parcels);
        $this->assertContainsOnlyInstancesOf(Parcel::class, $this->shipment->parcels);
        $this->assertSame($parcel1, $this->shipment->parcels[0]);
        $this->assertSame($parcel2, $this->shipment->parcels[1]);
    }

    /** @test */
    public function testSetServices()
    {
        $services = new Services();
        $this->shipment->setServices($services);

        $this->assertSame($services, $this->shipment->services);
    }
}
