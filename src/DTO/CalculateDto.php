<?php

namespace App\DTO;

class CalculateDto
{
    public float|int|string $baseCost;

    public string $birthDate;

    public string $travelDate;

    public string|null $paymentDate;

    public float|int|string $finalCost;

    /**
     * @return float|int|string
     */
    public function getBaseCost(): float|int|string
    {
        return $this->baseCost;
    }

    /**
     * @param float|int|string $baseCost
     * @return CalculateDto
     */
    public function setBaseCost(float|int|string $baseCost): CalculateDto
    {
        $this->baseCost = $baseCost;
        return $this;
    }

    /**
     * @return string
     */
    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    /**
     * @param string $birthDate
     * @return CalculateDto
     */
    public function setBirthDate(string $birthDate): CalculateDto
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getTravelDate(): string
    {
        return $this->travelDate;
    }

    /**
     * @param string $travelDate
     * @return CalculateDto
     */
    public function setTravelDate(string $travelDate): CalculateDto
    {
        $this->travelDate = $travelDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentDate(): ?string
    {
        return $this->paymentDate;
    }

    /**
     * @param string|null $paymentDate
     * @return CalculateDto
     */
    public function setPaymentDate(?string $paymentDate): CalculateDto
    {
        $this->paymentDate = $paymentDate;
        return $this;
    }

    /**
     * @return float|int|string
     */
    public function getFinalCost(): float|int|string
    {
        return $this->finalCost;
    }

    /**
     * @param float|int|string $finalCost
     * @return CalculateDto
     */
    public function setFinalCost(float|int|string $finalCost): CalculateDto
    {
        $this->finalCost = $finalCost;
        return $this;
    }



}