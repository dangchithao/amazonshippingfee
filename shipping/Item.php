<?php

namespace amazon\shipping;

class Item
{
    /**
     * 11$/kg
     */
    const WEIGHT_COEFFICIENT = 11;

    /**
     * 11$/m3
     */
    const DIMENSION_COEFFICIENT = 11;

    /**
     * @var float
     */
    private $amazonPrice;

    /**
     * @var float
     */
    private $weight;

    /**
     * @var
     */
    private $width;

    /**
     * @var
     */
    private $height;

    /**
     * @var
     */
    private $depth;

    /**
     * @var array
     */
    private $shippingFeeTypes = [];

    /**
     * Item constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (empty($data))
        {
            return;
        }

        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }

        $this->shippingFeeTypes = [
            $this->getFeeByWeight(),
            $this->getFeeByDimension()
        ];
    }

    /**
     * @return float
     */
    public function getItemPrice()
    {
        return $this->amazonPrice + $this->getShippingFee();
    }

    /**
     * @param float $newType
     *
     * @return void
     */
    public function addShippingFreeType($newType)
    {
        $this->shippingFeeTypes[] = $newType;
    }

    /**
     * @return mixed
     */
    private function getShippingFee()
    {
        return max($this->shippingFeeTypes);
    }

    /**
     * @return float|int
     */
    private function getFeeByWeight()
    {
        return $this->weight * self::WEIGHT_COEFFICIENT;
    }

    /**
     * @return float|int
     */
    private function getFeeByDimension()
    {
        return $this->width * $this->height * $this->depth * self::WEIGHT_COEFFICIENT;
    }
}
