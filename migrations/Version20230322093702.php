<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230322093702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE visiteur_praticien (visiteur_id INT NOT NULL, praticien_id INT NOT NULL, INDEX IDX_298AC7497F72333D (visiteur_id), INDEX IDX_298AC7492391866B (praticien_id), PRIMARY KEY(visiteur_id, praticien_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE visiteur_praticien ADD CONSTRAINT FK_298AC7497F72333D FOREIGN KEY (visiteur_id) REFERENCES visiteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE visiteur_praticien ADD CONSTRAINT FK_298AC7492391866B FOREIGN KEY (praticien_id) REFERENCES praticien (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE visite ADD praticien_id INT DEFAULT NULL, ADD visiteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE visite ADD CONSTRAINT FK_B09C8CBB2391866B FOREIGN KEY (praticien_id) REFERENCES praticien (id)');
        $this->addSql('ALTER TABLE visite ADD CONSTRAINT FK_B09C8CBB7F72333D FOREIGN KEY (visiteur_id) REFERENCES visiteur (id)');
        $this->addSql('CREATE INDEX IDX_B09C8CBB2391866B ON visite (praticien_id)');
        $this->addSql('CREATE INDEX IDX_B09C8CBB7F72333D ON visite (visiteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE visiteur_praticien DROP FOREIGN KEY FK_298AC7497F72333D');
        $this->addSql('ALTER TABLE visiteur_praticien DROP FOREIGN KEY FK_298AC7492391866B');
        $this->addSql('DROP TABLE visiteur_praticien');
        $this->addSql('ALTER TABLE visite DROP FOREIGN KEY FK_B09C8CBB2391866B');
        $this->addSql('ALTER TABLE visite DROP FOREIGN KEY FK_B09C8CBB7F72333D');
        $this->addSql('DROP INDEX IDX_B09C8CBB2391866B ON visite');
        $this->addSql('DROP INDEX IDX_B09C8CBB7F72333D ON visite');
        $this->addSql('ALTER TABLE visite DROP praticien_id, DROP visiteur_id');
    }
}
