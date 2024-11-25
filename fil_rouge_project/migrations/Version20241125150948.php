<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241125150948 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit (ref_produit VARCHAR(5) NOT NULL, nom_produit VARCHAR(20) NOT NULL, descr_produit VARCHAR(50) NOT NULL, prix_achat_produit NUMERIC(6, 2) NOT NULL, photo_produit VARCHAR(100) NOT NULL, prix_vente_produit_ht NUMERIC(6, 2) NOT NULL, stock_produit INT NOT NULL, valide_produit TINYINT(1) NOT NULL, active_produit TINYINT(1) NOT NULL, PRIMARY KEY(ref_produit)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE produit');
    }
}
