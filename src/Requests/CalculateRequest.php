<?php

namespace App\Requests;

use Symfony\Component\Validator\Constraints as Assert;

class CalculateRequest extends BaseRequest
{
    #[Assert\Type('numeric')]
    #[Assert\NotBlank()]
    protected float|int|string $baseCost;

    #[Assert\NotBlank()]
    #[Assert\DateTime(format: 'd.m.Y')]
    protected string $birthDate;

    #[Assert\DateTime(format: 'd.m.Y')]
    protected string|null $travelDate = null;

    #[Assert\DateTime(format: 'd.m.Y')]
    protected string|null $paymentDate = null;

    public function getBaseCost(): float|int|string
    {
        return $this->baseCost;
    }

    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    public function getTravelDate(): string|null
    {
        return $this->travelDate;
    }

    public function getPaymentDate(): string|null
    {
        return $this->paymentDate;
    }



    /**
     * Выключение авто-валидации
     *
     * @return bool
     */
//    protected function autoValidateRequest(): bool
//    {
//        return false;
//    }
}