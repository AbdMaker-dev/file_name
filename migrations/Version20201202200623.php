<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201202200623 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apprenant (id INT NOT NULL, profil_sortie_id INT DEFAULT NULL, promo_id INT NOT NULL, attente TINYINT(1) NOT NULL, INDEX IDX_C4EB462E6409EF73 (profil_sortie_id), INDEX IDX_C4EB462ED0C07AFF (promo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apprenant_groupe (apprenant_id INT NOT NULL, groupe_id INT NOT NULL, INDEX IDX_1D224F8DC5697D6D (apprenant_id), INDEX IDX_1D224F8D7A45358C (groupe_id), PRIMARY KEY(apprenant_id, groupe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brief (id INT AUTO_INCREMENT NOT NULL, langue_id INT DEFAULT NULL, referentiel_id INT DEFAULT NULL, formateur_id INT DEFAULT NULL, etat_brief_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contexte VARCHAR(255) NOT NULL, modalite_pedagogique VARCHAR(255) NOT NULL, critere_performance VARCHAR(255) NOT NULL, modalite_evaluation VARCHAR(255) NOT NULL, date_creation DATE NOT NULL, image LONGBLOB DEFAULT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_1FBB10072AADBACD (langue_id), INDEX IDX_1FBB1007805DB139 (referentiel_id), INDEX IDX_1FBB1007155D8F51 (formateur_id), INDEX IDX_1FBB1007E8AA036F (etat_brief_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brief_niveau (brief_id INT NOT NULL, niveau_id INT NOT NULL, INDEX IDX_1BF05631757FABFF (brief_id), INDEX IDX_1BF05631B3E9C81 (niveau_id), PRIMARY KEY(brief_id, niveau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brief_tags (brief_id INT NOT NULL, tags_id INT NOT NULL, INDEX IDX_D4F170DD757FABFF (brief_id), INDEX IDX_D4F170DD8D7B4FB4 (tags_id), PRIMARY KEY(brief_id, tags_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brief_livrable_attendus (brief_id INT NOT NULL, livrable_attendus_id INT NOT NULL, INDEX IDX_2402D7A2757FABFF (brief_id), INDEX IDX_2402D7A275D62BB4 (livrable_attendus_id), PRIMARY KEY(brief_id, livrable_attendus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brief_brief_groupe (brief_id INT NOT NULL, brief_groupe_id INT NOT NULL, INDEX IDX_D5A983D4757FABFF (brief_id), INDEX IDX_D5A983D463CFEB4F (brief_groupe_id), PRIMARY KEY(brief_id, brief_groupe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brief_groupe (id INT AUTO_INCREMENT NOT NULL, etat_brief_groupe_id INT NOT NULL, INDEX IDX_5496297B7777C7A0 (etat_brief_groupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brief_promotions (id INT AUTO_INCREMENT NOT NULL, brief_id INT DEFAULT NULL, statut VARCHAR(255) NOT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_E86F29E0757FABFF (brief_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cm (id INT NOT NULL, cni VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, groupe_competence_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_94D4687F89034830 (groupe_competence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE critere_admission (id INT AUTO_INCREMENT NOT NULL, referentiel_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_D65A82E2805DB139 (referentiel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE critere_evaluation (id INT AUTO_INCREMENT NOT NULL, referentiel_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_CB0C6F2F805DB139 (referentiel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat_brief (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat_brief_groupes (id INT AUTO_INCREMENT NOT NULL, brief_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_CAF9E4E0757FABFF (brief_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formateur (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, promo_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, statut TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_4B98C21D0C07AFF (promo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_brief_groupe (groupe_id INT NOT NULL, brief_groupe_id INT NOT NULL, INDEX IDX_28C51BBF7A45358C (groupe_id), INDEX IDX_28C51BBF63CFEB4F (brief_groupe_id), PRIMARY KEY(groupe_id, brief_groupe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_competence (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_tag (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE langue (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livrable_attendu_apprenant (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) DEFAULT NULL, ressource LONGBLOB DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livrable_attendu_apprenant_livrable_attendus (livrable_attendu_apprenant_id INT NOT NULL, livrable_attendus_id INT NOT NULL, INDEX IDX_F15E21B1EE63D1F4 (livrable_attendu_apprenant_id), INDEX IDX_F15E21B175D62BB4 (livrable_attendus_id), PRIMARY KEY(livrable_attendu_apprenant_id, livrable_attendus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livrable_attendu_apprenant_apprenant (livrable_attendu_apprenant_id INT NOT NULL, apprenant_id INT NOT NULL, INDEX IDX_BA8EFE96EE63D1F4 (livrable_attendu_apprenant_id), INDEX IDX_BA8EFE96C5697D6D (apprenant_id), PRIMARY KEY(livrable_attendu_apprenant_id, apprenant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livrable_attendus (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livrable_partiel (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, type VARCHAR(255) NOT NULL, date_affectation DATE NOT NULL, date_soumission DATE NOT NULL, deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livrable_rendu (id INT AUTO_INCREMENT NOT NULL, date_rendu DATE NOT NULL, delai DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, competence_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, deleted TINYINT(1) NOT NULL, cri_evaluation LONGTEXT NOT NULL, gr_action LONGTEXT NOT NULL, INDEX IDX_4BDFF36B15761DAB (competence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, deleted TINYINT(1) DEFAULT \'0\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile_sortie (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promo (id INT AUTO_INCREMENT NOT NULL, referentiel_id INT NOT NULL, langue_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, lieu VARCHAR(255) NOT NULL, ref_agate VARCHAR(255) NOT NULL, fabrique VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, data_fin DATE NOT NULL, avatare LONGBLOB DEFAULT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_B0139AFB805DB139 (referentiel_id), INDEX IDX_B0139AFB2AADBACD (langue_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promo_formateur (promo_id INT NOT NULL, formateur_id INT NOT NULL, INDEX IDX_C5BC19F4D0C07AFF (promo_id), INDEX IDX_C5BC19F4155D8F51 (formateur_id), PRIMARY KEY(promo_id, formateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promo_brief (promo_id INT NOT NULL, brief_id INT NOT NULL, INDEX IDX_F6922C91D0C07AFF (promo_id), INDEX IDX_F6922C91757FABFF (brief_id), PRIMARY KEY(promo_id, brief_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE referentiel (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, presentation LONGTEXT NOT NULL, deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE referentiel_competence (referentiel_id INT NOT NULL, competence_id INT NOT NULL, INDEX IDX_2377878B805DB139 (referentiel_id), INDEX IDX_2377878B15761DAB (competence_id), PRIMARY KEY(referentiel_id, competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ressource (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) DEFAULT NULL, piece_jointe LONGBLOB DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut_livrable (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags (id INT AUTO_INCREMENT NOT NULL, groupe_tag_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_6FBC9426D1EC9F2B (groupe_tag_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, profile_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, deleted TINYINT(1) NOT NULL, email VARCHAR(255) NOT NULL, avatare LONGBLOB DEFAULT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), INDEX IDX_8D93D649CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apprenant ADD CONSTRAINT FK_C4EB462E6409EF73 FOREIGN KEY (profil_sortie_id) REFERENCES profile_sortie (id)');
        $this->addSql('ALTER TABLE apprenant ADD CONSTRAINT FK_C4EB462ED0C07AFF FOREIGN KEY (promo_id) REFERENCES promo (id)');
        $this->addSql('ALTER TABLE apprenant ADD CONSTRAINT FK_C4EB462EBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apprenant_groupe ADD CONSTRAINT FK_1D224F8DC5697D6D FOREIGN KEY (apprenant_id) REFERENCES apprenant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apprenant_groupe ADD CONSTRAINT FK_1D224F8D7A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE brief ADD CONSTRAINT FK_1FBB10072AADBACD FOREIGN KEY (langue_id) REFERENCES langue (id)');
        $this->addSql('ALTER TABLE brief ADD CONSTRAINT FK_1FBB1007805DB139 FOREIGN KEY (referentiel_id) REFERENCES referentiel (id)');
        $this->addSql('ALTER TABLE brief ADD CONSTRAINT FK_1FBB1007155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id)');
        $this->addSql('ALTER TABLE brief ADD CONSTRAINT FK_1FBB1007E8AA036F FOREIGN KEY (etat_brief_id) REFERENCES etat_brief (id)');
        $this->addSql('ALTER TABLE brief_niveau ADD CONSTRAINT FK_1BF05631757FABFF FOREIGN KEY (brief_id) REFERENCES brief (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE brief_niveau ADD CONSTRAINT FK_1BF05631B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE brief_tags ADD CONSTRAINT FK_D4F170DD757FABFF FOREIGN KEY (brief_id) REFERENCES brief (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE brief_tags ADD CONSTRAINT FK_D4F170DD8D7B4FB4 FOREIGN KEY (tags_id) REFERENCES tags (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE brief_livrable_attendus ADD CONSTRAINT FK_2402D7A2757FABFF FOREIGN KEY (brief_id) REFERENCES brief (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE brief_livrable_attendus ADD CONSTRAINT FK_2402D7A275D62BB4 FOREIGN KEY (livrable_attendus_id) REFERENCES livrable_attendus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE brief_brief_groupe ADD CONSTRAINT FK_D5A983D4757FABFF FOREIGN KEY (brief_id) REFERENCES brief (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE brief_brief_groupe ADD CONSTRAINT FK_D5A983D463CFEB4F FOREIGN KEY (brief_groupe_id) REFERENCES brief_groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE brief_groupe ADD CONSTRAINT FK_5496297B7777C7A0 FOREIGN KEY (etat_brief_groupe_id) REFERENCES etat_brief_groupes (id)');
        $this->addSql('ALTER TABLE brief_promotions ADD CONSTRAINT FK_E86F29E0757FABFF FOREIGN KEY (brief_id) REFERENCES brief (id)');
        $this->addSql('ALTER TABLE cm ADD CONSTRAINT FK_3C0A377EBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT FK_94D4687F89034830 FOREIGN KEY (groupe_competence_id) REFERENCES groupe_competence (id)');
        $this->addSql('ALTER TABLE critere_admission ADD CONSTRAINT FK_D65A82E2805DB139 FOREIGN KEY (referentiel_id) REFERENCES referentiel (id)');
        $this->addSql('ALTER TABLE critere_evaluation ADD CONSTRAINT FK_CB0C6F2F805DB139 FOREIGN KEY (referentiel_id) REFERENCES referentiel (id)');
        $this->addSql('ALTER TABLE etat_brief_groupes ADD CONSTRAINT FK_CAF9E4E0757FABFF FOREIGN KEY (brief_id) REFERENCES brief (id)');
        $this->addSql('ALTER TABLE formateur ADD CONSTRAINT FK_ED767E4FBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe ADD CONSTRAINT FK_4B98C21D0C07AFF FOREIGN KEY (promo_id) REFERENCES promo (id)');
        $this->addSql('ALTER TABLE groupe_brief_groupe ADD CONSTRAINT FK_28C51BBF7A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_brief_groupe ADD CONSTRAINT FK_28C51BBF63CFEB4F FOREIGN KEY (brief_groupe_id) REFERENCES brief_groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livrable_attendu_apprenant_livrable_attendus ADD CONSTRAINT FK_F15E21B1EE63D1F4 FOREIGN KEY (livrable_attendu_apprenant_id) REFERENCES livrable_attendu_apprenant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livrable_attendu_apprenant_livrable_attendus ADD CONSTRAINT FK_F15E21B175D62BB4 FOREIGN KEY (livrable_attendus_id) REFERENCES livrable_attendus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livrable_attendu_apprenant_apprenant ADD CONSTRAINT FK_BA8EFE96EE63D1F4 FOREIGN KEY (livrable_attendu_apprenant_id) REFERENCES livrable_attendu_apprenant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livrable_attendu_apprenant_apprenant ADD CONSTRAINT FK_BA8EFE96C5697D6D FOREIGN KEY (apprenant_id) REFERENCES apprenant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE niveau ADD CONSTRAINT FK_4BDFF36B15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id)');
        $this->addSql('ALTER TABLE promo ADD CONSTRAINT FK_B0139AFB805DB139 FOREIGN KEY (referentiel_id) REFERENCES referentiel (id)');
        $this->addSql('ALTER TABLE promo ADD CONSTRAINT FK_B0139AFB2AADBACD FOREIGN KEY (langue_id) REFERENCES langue (id)');
        $this->addSql('ALTER TABLE promo_formateur ADD CONSTRAINT FK_C5BC19F4D0C07AFF FOREIGN KEY (promo_id) REFERENCES promo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE promo_formateur ADD CONSTRAINT FK_C5BC19F4155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE promo_brief ADD CONSTRAINT FK_F6922C91D0C07AFF FOREIGN KEY (promo_id) REFERENCES promo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE promo_brief ADD CONSTRAINT FK_F6922C91757FABFF FOREIGN KEY (brief_id) REFERENCES brief (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE referentiel_competence ADD CONSTRAINT FK_2377878B805DB139 FOREIGN KEY (referentiel_id) REFERENCES referentiel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE referentiel_competence ADD CONSTRAINT FK_2377878B15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tags ADD CONSTRAINT FK_6FBC9426D1EC9F2B FOREIGN KEY (groupe_tag_id) REFERENCES groupe_tag (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apprenant_groupe DROP FOREIGN KEY FK_1D224F8DC5697D6D');
        $this->addSql('ALTER TABLE livrable_attendu_apprenant_apprenant DROP FOREIGN KEY FK_BA8EFE96C5697D6D');
        $this->addSql('ALTER TABLE brief_niveau DROP FOREIGN KEY FK_1BF05631757FABFF');
        $this->addSql('ALTER TABLE brief_tags DROP FOREIGN KEY FK_D4F170DD757FABFF');
        $this->addSql('ALTER TABLE brief_livrable_attendus DROP FOREIGN KEY FK_2402D7A2757FABFF');
        $this->addSql('ALTER TABLE brief_brief_groupe DROP FOREIGN KEY FK_D5A983D4757FABFF');
        $this->addSql('ALTER TABLE brief_promotions DROP FOREIGN KEY FK_E86F29E0757FABFF');
        $this->addSql('ALTER TABLE etat_brief_groupes DROP FOREIGN KEY FK_CAF9E4E0757FABFF');
        $this->addSql('ALTER TABLE promo_brief DROP FOREIGN KEY FK_F6922C91757FABFF');
        $this->addSql('ALTER TABLE brief_brief_groupe DROP FOREIGN KEY FK_D5A983D463CFEB4F');
        $this->addSql('ALTER TABLE groupe_brief_groupe DROP FOREIGN KEY FK_28C51BBF63CFEB4F');
        $this->addSql('ALTER TABLE niveau DROP FOREIGN KEY FK_4BDFF36B15761DAB');
        $this->addSql('ALTER TABLE referentiel_competence DROP FOREIGN KEY FK_2377878B15761DAB');
        $this->addSql('ALTER TABLE brief DROP FOREIGN KEY FK_1FBB1007E8AA036F');
        $this->addSql('ALTER TABLE brief_groupe DROP FOREIGN KEY FK_5496297B7777C7A0');
        $this->addSql('ALTER TABLE brief DROP FOREIGN KEY FK_1FBB1007155D8F51');
        $this->addSql('ALTER TABLE promo_formateur DROP FOREIGN KEY FK_C5BC19F4155D8F51');
        $this->addSql('ALTER TABLE apprenant_groupe DROP FOREIGN KEY FK_1D224F8D7A45358C');
        $this->addSql('ALTER TABLE groupe_brief_groupe DROP FOREIGN KEY FK_28C51BBF7A45358C');
        $this->addSql('ALTER TABLE competence DROP FOREIGN KEY FK_94D4687F89034830');
        $this->addSql('ALTER TABLE tags DROP FOREIGN KEY FK_6FBC9426D1EC9F2B');
        $this->addSql('ALTER TABLE brief DROP FOREIGN KEY FK_1FBB10072AADBACD');
        $this->addSql('ALTER TABLE promo DROP FOREIGN KEY FK_B0139AFB2AADBACD');
        $this->addSql('ALTER TABLE livrable_attendu_apprenant_livrable_attendus DROP FOREIGN KEY FK_F15E21B1EE63D1F4');
        $this->addSql('ALTER TABLE livrable_attendu_apprenant_apprenant DROP FOREIGN KEY FK_BA8EFE96EE63D1F4');
        $this->addSql('ALTER TABLE brief_livrable_attendus DROP FOREIGN KEY FK_2402D7A275D62BB4');
        $this->addSql('ALTER TABLE livrable_attendu_apprenant_livrable_attendus DROP FOREIGN KEY FK_F15E21B175D62BB4');
        $this->addSql('ALTER TABLE brief_niveau DROP FOREIGN KEY FK_1BF05631B3E9C81');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649CCFA12B8');
        $this->addSql('ALTER TABLE apprenant DROP FOREIGN KEY FK_C4EB462E6409EF73');
        $this->addSql('ALTER TABLE apprenant DROP FOREIGN KEY FK_C4EB462ED0C07AFF');
        $this->addSql('ALTER TABLE groupe DROP FOREIGN KEY FK_4B98C21D0C07AFF');
        $this->addSql('ALTER TABLE promo_formateur DROP FOREIGN KEY FK_C5BC19F4D0C07AFF');
        $this->addSql('ALTER TABLE promo_brief DROP FOREIGN KEY FK_F6922C91D0C07AFF');
        $this->addSql('ALTER TABLE brief DROP FOREIGN KEY FK_1FBB1007805DB139');
        $this->addSql('ALTER TABLE critere_admission DROP FOREIGN KEY FK_D65A82E2805DB139');
        $this->addSql('ALTER TABLE critere_evaluation DROP FOREIGN KEY FK_CB0C6F2F805DB139');
        $this->addSql('ALTER TABLE promo DROP FOREIGN KEY FK_B0139AFB805DB139');
        $this->addSql('ALTER TABLE referentiel_competence DROP FOREIGN KEY FK_2377878B805DB139');
        $this->addSql('ALTER TABLE brief_tags DROP FOREIGN KEY FK_D4F170DD8D7B4FB4');
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D76BF396750');
        $this->addSql('ALTER TABLE apprenant DROP FOREIGN KEY FK_C4EB462EBF396750');
        $this->addSql('ALTER TABLE cm DROP FOREIGN KEY FK_3C0A377EBF396750');
        $this->addSql('ALTER TABLE formateur DROP FOREIGN KEY FK_ED767E4FBF396750');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE apprenant');
        $this->addSql('DROP TABLE apprenant_groupe');
        $this->addSql('DROP TABLE brief');
        $this->addSql('DROP TABLE brief_niveau');
        $this->addSql('DROP TABLE brief_tags');
        $this->addSql('DROP TABLE brief_livrable_attendus');
        $this->addSql('DROP TABLE brief_brief_groupe');
        $this->addSql('DROP TABLE brief_groupe');
        $this->addSql('DROP TABLE brief_promotions');
        $this->addSql('DROP TABLE cm');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE critere_admission');
        $this->addSql('DROP TABLE critere_evaluation');
        $this->addSql('DROP TABLE etat_brief');
        $this->addSql('DROP TABLE etat_brief_groupes');
        $this->addSql('DROP TABLE formateur');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE groupe_brief_groupe');
        $this->addSql('DROP TABLE groupe_competence');
        $this->addSql('DROP TABLE groupe_tag');
        $this->addSql('DROP TABLE langue');
        $this->addSql('DROP TABLE livrable_attendu_apprenant');
        $this->addSql('DROP TABLE livrable_attendu_apprenant_livrable_attendus');
        $this->addSql('DROP TABLE livrable_attendu_apprenant_apprenant');
        $this->addSql('DROP TABLE livrable_attendus');
        $this->addSql('DROP TABLE livrable_partiel');
        $this->addSql('DROP TABLE livrable_rendu');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE profile_sortie');
        $this->addSql('DROP TABLE promo');
        $this->addSql('DROP TABLE promo_formateur');
        $this->addSql('DROP TABLE promo_brief');
        $this->addSql('DROP TABLE referentiel');
        $this->addSql('DROP TABLE referentiel_competence');
        $this->addSql('DROP TABLE ressource');
        $this->addSql('DROP TABLE statut_livrable');
        $this->addSql('DROP TABLE tags');
        $this->addSql('DROP TABLE user');
    }
}
