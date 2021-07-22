<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721204930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_spot (user_id INT NOT NULL, spot_id INT NOT NULL, INDEX IDX_C3B336BAA76ED395 (user_id), INDEX IDX_C3B336BA2DF1D37C (spot_id), PRIMARY KEY(user_id, spot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_board (user_id INT NOT NULL, board_id INT NOT NULL, INDEX IDX_BA94D01FA76ED395 (user_id), INDEX IDX_BA94D01FE7EC5785 (board_id), PRIMARY KEY(user_id, board_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_spot ADD CONSTRAINT FK_C3B336BAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_spot ADD CONSTRAINT FK_C3B336BA2DF1D37C FOREIGN KEY (spot_id) REFERENCES spot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_board ADD CONSTRAINT FK_BA94D01FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_board ADD CONSTRAINT FK_BA94D01FE7EC5785 FOREIGN KEY (board_id) REFERENCES board (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD adress VARCHAR(255) DEFAULT NULL, ADD postal_code VARCHAR(255) DEFAULT NULL, ADD city VARCHAR(255) DEFAULT NULL, ADD nick_name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_spot');
        $this->addSql('DROP TABLE user_board');
        $this->addSql('ALTER TABLE user DROP first_name, DROP last_name, DROP adress, DROP postal_code, DROP city, DROP nick_name');
    }
}
