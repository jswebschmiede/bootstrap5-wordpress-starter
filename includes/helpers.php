<?php


if (!function_exists('dd')) {
    /**
     * Var_dump and die method
     *
     * @return void
     */
    function dd()
    {
        echo '<pre>';
        array_map(function ($x) {
            var_dump($x);
        }, func_get_args());
        echo '</pre>';
        die;
    }
}