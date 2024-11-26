<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241126082549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD nom_ss_rubrique_id VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27490BE348 FOREIGN KEY (nom_ss_rubrique_id) REFERENCES sous_rubrique (nom_ss_rubrique)');
        $this->addSql('CREATE INDEX IDX_29A5EC27490BE348 ON produit (nom_ss_rubrique_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27490BE348');
        $this->addSql('DROP INDEX IDX_29A5EC27490BE348 ON produit');
        $this->addSql('ALTER TABLE produit DROP nom_ss_rubrique_id');
    }
}
