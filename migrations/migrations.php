<?php


define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', implode(
        DS, [
            __DIR__,
            '..',
        ]
    )
);

define('CONFIG_AUTOLOAD_DIR', implode(
        DS,
        [
            ROOT_DIR,
            'config',
            'autoload'
        ]
    )
);

define('CONNECTION_DATA', require implode(
    DS,
    [
        CONFIG_AUTOLOAD_DIR,
        'database-connection.global.php'
    ]
)
);

require_once implode(
    DS,
    [
        ROOT_DIR,
        'vendor',
        'autoload.php'
    ]
);

use Doctrine\DBAL\Migrations\Tools\Console\Command;
use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\DBAL\Migrations\MigrationsVersion;


use Symfony\Component\Console;
//$connection = \Doctrine\DBAL\DriverManager::getConnection(CONNECTION_DATA
if (!empty(CONNECTION_DATA['mysql'])) {
    $params = CONNECTION_DATA['mysql'];
    if (!is_array($params)) {
        throw new \InvalidArgumentException('The connection file has to return an array.');
    }
    $connection = \Doctrine\DBAL\DriverManager::getConnection($params);
} else {
    throw new \InvalidArgumentException('Missing configurations. Alternatively use --db-configuration.');
}

$connection->getDatabasePlatform()
    ->registerDoctrineTypeMapping('enum', 'string');

$helperSet = new Console\Helper\HelperSet();
$helperSet->set(new Console\Helper\QuestionHelper(), 'dialog');
$helperSet->set(new ConnectionHelper($connection), 'connection');

// Instantiate console application
$cli = new Console\Application('Doctrine Migrations', MigrationsVersion::VERSION());
$cli->setCatchExceptions(true);

$cli->setHelperSet($helperSet);

// Add Migrations commands
$commands = [];
$commands[] = new Command\ExecuteCommand();
$commands[] = new Command\GenerateCommand();
$commands[] = new Command\LatestCommand();
$commands[] = new Command\MigrateCommand();
$commands[] = new Command\StatusCommand();
$commands[] = new Command\VersionCommand();

foreach ($commands as $command) {
    $command->setName(str_replace('migration:', '', $command->getName()));
}
$cli->addCommands($commands);

// Run!
$cli->run();
