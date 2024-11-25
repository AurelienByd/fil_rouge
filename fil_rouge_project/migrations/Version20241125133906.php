<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241125133906 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sous_rubrique ADD nom_rubrique_id VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE sous_rubrique ADD CONSTRAINT FK_87EA3D29F5B3232C FOREIGN KEY (nom_rubrique_id) REFERENCES rubrique (nom_rubrique)');
        $this->addSql('CREATE INDEX IDX_87EA3D29F5B3232C ON sous_rubrique (nom_rubrique_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sous_rubrique DROP FOREIGN KEY FK_87EA3D29F5B3232C');
        $this->addSql('DROP INDEX IDX_87EA3D29F5B3232C ON sous_rubrique');
        $this->addSql('ALTER TABLE sous_rubrique DROP nom_rubrique_id');
    }
}
