<?php

namespace App\Controller;

use App\DTO\CalculateDto;
use App\Requests\CalculateRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    /**
     * @throws \Exception
     */
    #[Route('/calculator', name: 'name.calculator', methods: 'POST')]
    public function calculateAction(CalculateRequest $request): JsonResponse
    {
        try {
            $calculateDto = new CalculateDto();

            $calculateDto
                ->setBaseCost($request->getBaseCost())
                ->setBirthDate($request->getBirthDate())
                ->setPaymentDate($request->getPaymentDate());
            if (is_null($travelDate = $request->getTravelDate())) {
                $calculateDto->setTravelDate(date_format((new \DateTime()), 'd.m.Y'));
            } else {
                $calculateDto->setTravelDate($travelDate);
            }

            $childrenDiscount = $this->childrenDiscount($calculateDto->getBirthDate(), $calculateDto->getTravelDate());
            if ($childrenDiscount != 0) {
                if ($childrenDiscount === 30) {
                    $finalCost = $calculateDto->getBaseCost() * (100 - $childrenDiscount) / 100;
                    if ($calculateDto->getBaseCost() - $finalCost > 4500) {
                        $calculateDto->setFinalCost($calculateDto->getBaseCost() - 4500);
                    } else {
                        $calculateDto->setFinalCost($finalCost);
                    }
                } else {
                    $calculateDto->setFinalCost(
                        $calculateDto->getBaseCost() * (100 - $childrenDiscount) / 100
                    );
                }
            } else {
                $calculateDto->setFinalCost($calculateDto->getBaseCost());
            }

        } catch (\Throwable $exception) {
            return $this->json([
                "error" => $exception->getMessage(),
                "code" => $exception->getCode(),
            ]);
        }

        return $this->json(
            ['final_cost' => $calculateDto->getFinalCost()]
        );

    }

    /**
     * @param string $birthDate
     * @param string $travelDate
     *
     * @return int
     *
     * @throws \Exception
     */
    public function childrenDiscount(string $birthDate, string $travelDate): int
    {
        $birthDate = new \DateTime($birthDate);
        $travelDate = new \DateTime($travelDate);
        $year = $birthDate->diff($travelDate)->y;

        if ($year >= 3 && $year <= 5) {
            $discount = 80;
        } elseif ($year >= 6 && $year <= 11) {
            $discount = 30;
        } elseif ($year >= 12 && $year <= 17) {
            $discount = 10;
        } else {
            $discount = 0;
        }

        return $discount;
    }
}