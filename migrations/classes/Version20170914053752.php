<?php

namespace TExAPITest\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Schema\Table;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170914053752 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('cars');

        $table->addColumn('id', 'integer')
            ->setNotnull(true)
            ->setLength(11)
            ->setUnsigned(true)
            ->setAutoincrement(true);

        $table->addColumn('fk_auto', 'integer')
            ->setNotnull(true)
            ->setUnsigned(true)
            ->setLength(11);

        $table->addColumn('model', 'string')
            ->setNotnull(true)
            ->setLength(120);

        $table->setPrimaryKey(['id']);

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('cars');
    }
}
