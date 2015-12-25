<?php

// Load config
$config = include 'config.php';

// Load virtual host template file
$template = file_get_contents(__DIR__ . '/vhost.template');

// Add virtual hosts
foreach ($config['vhosts'] AS $serverName => $documentRoot) {

    // Fill template
    $vhost = preg_replace(
        [
            '/{{ServerName}}/i',
            '/{{DocumentRoot}}/i'
        ],
        [
            $serverName,
            $documentRoot
        ],
        $template
    );

    // Save virtual host config file
    file_put_contents(__DIR__ . '/tmp-' . $serverName . '.conf', $vhost);
    exec('sudo cp ' . __DIR__ . '/tmp-' . $serverName . '.conf /etc/apache2/sites-available/' . $serverName . '.conf');

    // Enable site
    exec('sudo a2ensite ' . $serverName . '.conf');

    // Reload apache2
    exec('sudo service apache2 reload');

    // Remove tmp file
    unlink(__DIR__ . '/tmp-' . $serverName . '.conf');

    echo 'Added ' . $serverName . "\n";

}