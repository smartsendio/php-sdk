<?php

namespace SmartSendIo\Api\Tests\Unit\Data;

use PHPUnit\Framework\TestCase;
use SmartSendIo\Api\Data\Item;

class ItemTest extends TestCase
{
    /** @var Item */
    protected $item;

    public function setUp(): void
    {
        $this->item = new Item();
    }

    /** @test */
    public function testSetInternalId()
    {
        $this->item->setInternalId('test-id-123');

        $this->assertEquals('test-id-123', $this->item->internal_id);
    }

    /** @test */
    public function testSetInternalReference()
    {
        $this->item->setInternalReference('test-id-ABC');

        $this->assertEquals('test-id-ABC', $this->item->internal_reference);
    }

    /** @test */
    public function testSetSku()
    {
        $this->item->setSku('ABC123');

        $this->assertEquals('ABC123', $this->item->sku);
    }

    /** @test */
    public function testSetName()
    {
        $this->item->setName('Batman Item');

        $this->assertEquals('Batman Item', $this->item->name);
    }

    /** @test */
    public function testSetDescription()
    {
        $this->item->setDescription('New Batman figure');

        $this->assertEquals('New Batman figure', $this->item->description);
    }

    /** @test */
    public function testSetHsCode()
    {
        $this->item->setHsCode('12345678');

        $this->assertEquals('12345678', $this->item->hs_code);
    }

    /** @test */
    public function testSetCountryOfOrigin()
    {
        $this->item->setHsCode('12345678');

        $this->assertEquals('12345678', $this->item->hs_code);
    }

    /** @test */
    public function testSetImageUrl()
    {
        $this->item->setImageUrl('https://example.com/img/batman.png');

        $this->assertEquals('https://example.com/img/batman.png', $this->item->image_url);
    }

    /** @test */
    public function testSetUnitWeight()
    {
        $this->item->setUnitWeight(12.3);

        $this->assertEquals(12.3, $this->item->unit_weight);
    }

    /** @test */
    public function testSetUnitPriceExcludingTax()
    {
        $this->item->setUnitPriceExcludingTax(14.34);

        $this->assertEquals(14.34, $this->item->unit_price_excluding_tax);
    }

    /** @test */
    public function testSetUnitPriceIncludingTax()
    {
        $this->item->setUnitPriceIncludingTax(15.88);

        $this->assertEquals(15.88, $this->item->unit_price_including_tax);
    }

    /** @test */
    public function testSetQuantity()
    {
        $this->item->setQuantity(2.5);

        $this->assertEquals(2.5, $this->item->quantity);
    }

    /** @test */
    public function testSetTotalPriceExcludingTax()
    {
        $this->item->setTotalPriceExcludingTax(79.12);

        $this->assertEquals(79.12, $this->item->total_price_excluding_tax);
    }

    /** @test */
    public function testSetTotalPriceIncludingTax()
    {
        $this->item->setTotalPriceIncludingTax(89.33);

        $this->assertEquals(89.33, $this->item->total_price_including_tax);
    }

    /** @test */
    public function testSetTotalTaxAmount()
    {
        $this->item->setTotalTaxAmount(30.55);

        $this->assertEquals(30.55, $this->item->total_tax_amount);
    }
}
