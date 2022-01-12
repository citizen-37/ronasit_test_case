<?php

namespace App\Lib\OpenWeatherMap\Assembler;

use App\Lib\OpenWeatherMap\DTO\Response\Response;

interface ResponseAssemblerInterface
{
    /**
     * @param $data
     * @return Response
     */
    public function assemble($data): Response;
}
