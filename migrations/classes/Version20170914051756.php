<?php

namespace TExAPITest\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Schema\Table;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170914051756 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('autos');

        $table->addColumn('id', 'integer')
            ->setNotnull(true)
            ->setLength(11)
            ->setUnsigned(true)
            ->setAutoincrement(true);

        $table->addColumn('plate', 'string')
            ->setNotnull(true)
            ->setLength(8);

        $table->addColumn('wheels', 'integer')
            ->setLength(2)
            ->setNotnull(true);

        $table->setPrimaryKey(['id']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('autos');
    }
}
