<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241126090632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD ref_fournisseur_produit_id VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC278E79F48C FOREIGN KEY (ref_fournisseur_produit_id) REFERENCES fournisseur (ref_fournisseur_produit)');
        $this->addSql('CREATE INDEX IDX_29A5EC278E79F48C ON produit (ref_fournisseur_produit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC278E79F48C');
        $this->addSql('DROP INDEX IDX_29A5EC278E79F48C ON produit');
        $this->addSql('ALTER TABLE produit DROP ref_fournisseur_produit_id');
    }
}
