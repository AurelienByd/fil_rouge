<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241127144328 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE selectionne (ref_produit_id VARCHAR(5) NOT NULL, ref_client_id VARCHAR(20) NOT NULL, INDEX IDX_40B048579F191E5 (ref_produit_id), INDEX IDX_40B048576AB16864 (ref_client_id), PRIMARY KEY(ref_produit_id, ref_client_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE selectionne ADD CONSTRAINT FK_40B048579F191E5 FOREIGN KEY (ref_produit_id) REFERENCES produit (ref_produit)');
        $this->addSql('ALTER TABLE selectionne ADD CONSTRAINT FK_40B048576AB16864 FOREIGN KEY (ref_client_id) REFERENCES client (ref_client)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE selectionne DROP FOREIGN KEY FK_40B048579F191E5');
        $this->addSql('ALTER TABLE selectionne DROP FOREIGN KEY FK_40B048576AB16864');
        $this->addSql('DROP TABLE selectionne');
    }
}
