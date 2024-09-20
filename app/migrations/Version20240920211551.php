<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240920211551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, idee_id INT NOT NULL, commentaire_id INT DEFAULT NULL, texte LONGTEXT NOT NULL, date_commentaire DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_67F068BCD40D782A (idee_id), INDEX IDX_67F068BCBA9CD190 (commentaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE idee (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(30) NOT NULL, description LONGTEXT NOT NULL, date_publication DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vote (id INT AUTO_INCREMENT NOT NULL, idee_id INT NOT NULL, adresse_ip VARCHAR(15) NOT NULL, pays VARCHAR(100) DEFAULT NULL, INDEX IDX_5A108564D40D782A (idee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCD40D782A FOREIGN KEY (idee_id) REFERENCES idee (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCBA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id)');
        $this->addSql('ALTER TABLE vote ADD CONSTRAINT FK_5A108564D40D782A FOREIGN KEY (idee_id) REFERENCES idee (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCD40D782A');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCBA9CD190');
        $this->addSql('ALTER TABLE vote DROP FOREIGN KEY FK_5A108564D40D782A');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE idee');
        $this->addSql('DROP TABLE vote');
    }
}
