<?php

namespace App\Services;

class PaginationService
{
    public static function getPerPage()
    {
        return env('PAGINATION_PER_PAGE', 10);
    }
}
