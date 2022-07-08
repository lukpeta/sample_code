<?php

namespace App\Classes;

class DayFromDate
{
    function days(int $day): string
    {
        $days = array('Niedziela', 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota');
        return $days[$day];
    }

    function month(int $month)
    {
        $months = array( '', 'stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia' );
        return $months[$month];
    }
}
