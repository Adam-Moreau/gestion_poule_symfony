<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220916135745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE poule ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE poule ADD CONSTRAINT FK_FA1FEB40FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_FA1FEB40FB88E14F ON poule (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE poule DROP FOREIGN KEY FK_FA1FEB40FB88E14F');
        $this->addSql('DROP INDEX IDX_FA1FEB40FB88E14F ON poule');
        $this->addSql('ALTER TABLE poule DROP utilisateur_id');
    }
}
