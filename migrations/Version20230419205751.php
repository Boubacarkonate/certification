<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230419205751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, administratif VARCHAR(255) DEFAULT NULL, aide_conseil VARCHAR(255) DEFAULT NULL, educatif VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E512469DE2 FOREIGN KEY (category_id) REFERENCES categorie (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F65593E512469DE2 ON annonce (category_id)');
        $this->addSql('ALTER TABLE cv ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE9212469DE2 FOREIGN KEY (category_id) REFERENCES categorie (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B66FFE9212469DE2 ON cv (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E512469DE2');
        $this->addSql('ALTER TABLE cv DROP FOREIGN KEY FK_B66FFE9212469DE2');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP INDEX UNIQ_F65593E512469DE2 ON annonce');
        $this->addSql('ALTER TABLE annonce DROP category_id');
        $this->addSql('DROP INDEX UNIQ_B66FFE9212469DE2 ON cv');
        $this->addSql('ALTER TABLE cv DROP category_id');
    }
}
