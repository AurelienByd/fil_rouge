<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241127125954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD ref_commercial_id VARCHAR(5) NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404555C04507C FOREIGN KEY (ref_commercial_id) REFERENCES commercial (ref_commercial)');
        $this->addSql('CREATE INDEX IDX_C74404555C04507C ON client (ref_commercial_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404555C04507C');
        $this->addSql('DROP INDEX IDX_C74404555C04507C ON client');
        $this->addSql('ALTER TABLE client DROP ref_commercial_id');
    }
}
