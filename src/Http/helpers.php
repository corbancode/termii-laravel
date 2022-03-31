<?php
    use Corbancode\TermiiLaravel\TermiiFactory;

    if (! function_exists('termii')) {
        function termii()
        {
            return app()->make(TermiiFactory::class);
        }
    }
?>
