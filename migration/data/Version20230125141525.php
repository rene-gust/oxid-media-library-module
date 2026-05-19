<?php

declare(strict_types=1);

namespace OxidEsales\MediaLibrary\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230125141525 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Update module tables';
    }

    public function up(Schema $schema): void
    {
        $platform = $this->connection->getDatabasePlatform();
        $platform->registerDoctrineTypeMapping('enum', 'string');

        $schemaManager = $this->connection->getSchemaManager();
        $columns = $schemaManager->listTableColumns('ddmedia');

        if (!isset($columns['ddimagesize'])) {
            $this->addSql('ALTER TABLE `ddmedia` ADD `DDIMAGESIZE` VARCHAR(100) AFTER `DDTHUMB`');
        }

        if (!isset($columns['oxshopid'])) {
            $this->addSql('ALTER TABLE `ddmedia` ADD `OXSHOPID` INT(10) UNSIGNED NOT NULL AFTER `OXID`');
        }
    }

    public function down(Schema $schema): void
    {
    }
}
