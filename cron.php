<?php
// This script runs the "artisan schedule:run" command, from a PHP script (because OVH
// only supports PHP scripts for cron tasks)
$_SERVER['argv'] = [
    'artisan',
    'schedule:run',
];

require __DIR__.'/artisan';