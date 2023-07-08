<?php
declare(strict_types=1);

namespace App\Domain\SharedKernel\Contracts;

interface IRepository
{
    public function findById($id);
}
