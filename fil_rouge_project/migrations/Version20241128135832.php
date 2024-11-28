<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241128135832 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE envoie (ref_produit_id VARCHAR(5) NOT NULL, num_commande_id INT NOT NULL, INDEX IDX_4BC1C0029F191E5 (ref_produit_id), INDEX IDX_4BC1C002F80F63BC (num_commande_id), PRIMARY KEY(ref_produit_id, num_commande_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE envoie ADD CONSTRAINT FK_4BC1C0029F191E5 FOREIGN KEY (ref_produit_id) REFERENCES produit (ref_produit)');
        $this->addSql('ALTER TABLE envoie ADD CONSTRAINT FK_4BC1C002F80F63BC FOREIGN KEY (num_commande_id) REFERENCES commande (num_commande)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE envoie DROP FOREIGN KEY FK_4BC1C0029F191E5');
        $this->addSql('ALTER TABLE envoie DROP FOREIGN KEY FK_4BC1C002F80F63BC');
        $this->addSql('DROP TABLE envoie');
    }
}
