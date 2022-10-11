<?php

namespace App\Interfaces;

interface DatatableInterface
{
    public function dataTable(array $data);
    public function permissions(string $id);
}
