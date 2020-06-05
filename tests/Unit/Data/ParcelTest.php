<?php

namespace Smartsendio\Api\Tests\Unit\Data;

use PHPUnit\Framework\TestCase;
use Smartsendio\Api\Data\Item;
use Smartsendio\Api\Data\Parcel;

class ParcelTest extends TestCase
{
    /** @var Parcel */
    protected $parcel;

    public function setUp(): void
    {
        $this->parcel = new Parcel();
    }

    /** @test */
    public function testSetInternalId()
    {
        $this->parcel->setInternalId('test-id-123');

        $this->assertEquals('test-id-123', $this->parcel->internal_id);
    }

    /** @test */
    public function testSetInternalReference()
    {
        $this->parcel->setInternalReference('test-id-ABC');

        $this->assertEquals('test-id-ABC', $this->parcel->internal_reference);
    }

    /** @test */
    public function testSetWeight()
    {
        $this->parcel->setWeight(2.34);

        $this->assertEquals(2.34, $this->parcel->weight);
    }

    /** @test */
    public function testSetHeight()
    {
        $this->parcel->setHeight(20.34);

        $this->assertEquals(20.34, $this->parcel->height);
    }

    /** @test */
    public function testSetWidth()
    {
        $this->parcel->setWidth(10.34);

        $this->assertEquals(10.34, $this->parcel->width);
    }

    /** @test */
    public function testSetLength()
    {
        $this->parcel->setLength(30.34);

        $this->assertEquals(30.34, $this->parcel->length);
    }

    /** @test */
    public function testSetFreetext()
    {
        $this->parcel->setFreetext('Long text could be used here');

        $this->assertEquals('Long text could be used here', $this->parcel->freetext);
    }

    /** @test */
    public function testSetTotalPriceExcludingTax()
    {
        $this->parcel->setTotalPriceExcludingTax(56.44);

        $this->assertEquals(56.44, $this->parcel->total_price_excluding_tax);
    }

    /** @test */
    public function testSetTotalPriceIncludingTax()
    {
        $this->parcel->setTotalPriceIncludingTax(66.44);

        $this->assertEquals(66.44, $this->parcel->total_price_including_tax);
    }

    /** @test */
    public function testSetTotalTaxAmount()
    {
        $this->parcel->setTotalTaxAmount(5.67);

        $this->assertEquals(5.67, $this->parcel->total_tax_amount);
    }

    /** @test */
    public function testSetItems()
    {
        $item1 = new Item();
        $item2 = new Item();

        $this->parcel->setItems([$item1, $item2]);

        $this->assertIsArray($this->parcel->items);
        $this->assertCount(2, $this->parcel->items);
        $this->assertContainsOnlyInstancesOf(Item::class, $this->parcel->items);
        $this->assertSame($item1, $this->parcel->items[0]);
        $this->assertSame($item2, $this->parcel->items[1]);
    }

    /** @test */
    public function testAddItem()
    {
        $item1 = new Item();
        $item2 = new Item();

        $this->parcel->addItem($item1)->addItem($item2);

        $this->assertIsArray($this->parcel->items);
        $this->assertCount(2, $this->parcel->items);
        $this->assertContainsOnlyInstancesOf(Item::class, $this->parcel->items);
        $this->assertSame($item1, $this->parcel->items[0]);
        $this->assertSame($item2, $this->parcel->items[1]);
    }
}
