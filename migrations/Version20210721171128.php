<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721171128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE brand DROP FOREIGN KEY FK_1C52F958EE45BDBF');
        $this->addSql('DROP INDEX UNIQ_1C52F958EE45BDBF ON brand');
        $this->addSql('ALTER TABLE brand DROP picture_id');
        $this->addSql('ALTER TABLE picture ADD brand_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F8944F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('CREATE INDEX IDX_16DB4F8944F5D008 ON picture (brand_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE brand ADD picture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE brand ADD CONSTRAINT FK_1C52F958EE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1C52F958EE45BDBF ON brand (picture_id)');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F8944F5D008');
        $this->addSql('DROP INDEX IDX_16DB4F8944F5D008 ON picture');
        $this->addSql('ALTER TABLE picture DROP brand_id');
    }
}
