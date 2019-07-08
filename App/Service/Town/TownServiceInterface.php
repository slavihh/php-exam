<?php


namespace App\Service\Town;


use App\Data\TownDTO;

interface TownServiceInterface
{
    /**
     * @return \Generator|TownDTO[]
     */
    public function getAll() : \Generator;
}