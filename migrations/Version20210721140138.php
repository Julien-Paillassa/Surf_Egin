<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721140138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE board (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, brand_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, size VARCHAR(255) NOT NULL, volume VARCHAR(255) NOT NULL, level VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_58562B4712469DE2 (category_id), INDEX IDX_58562B4744F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, picture_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1C52F958EE45BDBF (picture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, board_id INT DEFAULT NULL, spot_id INT DEFAULT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_16DB4F89E7EC5785 (board_id), INDEX IDX_16DB4F892DF1D37C (spot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rating (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, board_id INT DEFAULT NULL, spot_id INT DEFAULT NULL, content LONGTEXT DEFAULT NULL, mark DOUBLE PRECISION DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_D8892622A76ED395 (user_id), INDEX IDX_D8892622E7EC5785 (board_id), INDEX IDX_D88926222DF1D37C (spot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spot (id INT AUTO_INCREMENT NOT NULL, spot_type_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, coordinate VARCHAR(255) DEFAULT NULL, INDEX IDX_B9327A738FA6B83B (spot_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spot_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role JSON NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, pass_word VARCHAR(255) NOT NULL, adress VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(255) NOT NULL, city VARCHAR(255) DEFAULT NULL, nick_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_user (user_source INT NOT NULL, user_target INT NOT NULL, INDEX IDX_F7129A803AD8644E (user_source), INDEX IDX_F7129A80233D34C1 (user_target), PRIMARY KEY(user_source, user_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_spot (user_id INT NOT NULL, spot_id INT NOT NULL, INDEX IDX_C3B336BAA76ED395 (user_id), INDEX IDX_C3B336BA2DF1D37C (spot_id), PRIMARY KEY(user_id, spot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE board ADD CONSTRAINT FK_58562B4712469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE board ADD CONSTRAINT FK_58562B4744F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE brand ADD CONSTRAINT FK_1C52F958EE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89E7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F892DF1D37C FOREIGN KEY (spot_id) REFERENCES spot (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D8892622A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D8892622E7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D88926222DF1D37C FOREIGN KEY (spot_id) REFERENCES spot (id)');
        $this->addSql('ALTER TABLE spot ADD CONSTRAINT FK_B9327A738FA6B83B FOREIGN KEY (spot_type_id) REFERENCES spot_type (id)');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A803AD8644E FOREIGN KEY (user_source) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A80233D34C1 FOREIGN KEY (user_target) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_spot ADD CONSTRAINT FK_C3B336BAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_spot ADD CONSTRAINT FK_C3B336BA2DF1D37C FOREIGN KEY (spot_id) REFERENCES spot (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F89E7EC5785');
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY FK_D8892622E7EC5785');
        $this->addSql('ALTER TABLE board DROP FOREIGN KEY FK_58562B4744F5D008');
        $this->addSql('ALTER TABLE board DROP FOREIGN KEY FK_58562B4712469DE2');
        $this->addSql('ALTER TABLE brand DROP FOREIGN KEY FK_1C52F958EE45BDBF');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F892DF1D37C');
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY FK_D88926222DF1D37C');
        $this->addSql('ALTER TABLE user_spot DROP FOREIGN KEY FK_C3B336BA2DF1D37C');
        $this->addSql('ALTER TABLE spot DROP FOREIGN KEY FK_B9327A738FA6B83B');
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY FK_D8892622A76ED395');
        $this->addSql('ALTER TABLE user_user DROP FOREIGN KEY FK_F7129A803AD8644E');
        $this->addSql('ALTER TABLE user_user DROP FOREIGN KEY FK_F7129A80233D34C1');
        $this->addSql('ALTER TABLE user_spot DROP FOREIGN KEY FK_C3B336BAA76ED395');
        $this->addSql('DROP TABLE board');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE rating');
        $this->addSql('DROP TABLE spot');
        $this->addSql('DROP TABLE spot_type');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_user');
        $this->addSql('DROP TABLE user_spot');
    }
}
