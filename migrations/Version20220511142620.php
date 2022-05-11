<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511142620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, isbn VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, image_url VARCHAR(255) NOT NULL)');
        $this->addSql("INSERT INTO book (title,isbn,author,image_url) VALUES
                ('The Colour of Magic','0552166596','Terry Pratchett','https://www.terrypratchettbooks.com/wp-content/uploads/2019/04/thecolourofmagic-paperback.jpg'),
                 ('The Light Fantastic','055216660X','Terry Pratchett','https://www.terrypratchettbooks.com/wp-content/uploads/2019/04/thelightfantastic-paperback.jpg'),
                 ('Equal Rites','1804990159','Terry Pratchett','https://www.terrypratchettbooks.com/wp-content/uploads/2019/04/equalrites-paperback.jpg');");

        $this->addSql('CREATE TABLE tire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, width INTEGER DEFAULT NULL, profile INTEGER DEFAULT NULL, rim_size INTEGER DEFAULT NULL)');
        $this->addSql("INSERT INTO tire (brand,model,width,profile,rim_size) VALUES
                ('Kumho','Ecsta V700',225,45,17),
                ('Michelin','Pilot Sport Cup 2',225,40,18),
                ('Federal','595-RS Pro',225,45,17),
                ('Nankang','AR-1',225,45,17)");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE tire');
    }
}
