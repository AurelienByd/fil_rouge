<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241128130949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande ADD ref_client_id VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D6AB16864 FOREIGN KEY (ref_client_id) REFERENCES client (ref_client)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D6AB16864 ON commande (ref_client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D6AB16864');
        $this->addSql('DROP INDEX IDX_6EEAA67D6AB16864 ON commande');
        $this->addSql('ALTER TABLE commande DROP ref_client_id');
    }
}
