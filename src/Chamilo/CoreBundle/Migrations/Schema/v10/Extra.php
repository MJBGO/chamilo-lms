<?php
/* For licensing terms, see /chamilo_license.txt */

namespace Chamilo\CoreBundle\Migrations\Schema\v10;

use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;
use Oro\Bundle\MigrationBundle\Migration\OrderedMigrationInterface;

class Extra implements Migration, OrderedMigrationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 2;
    }

    public function up(Schema $schema, QueryBag $queries)
    {

$queries->addQuery("CREATE TABLE page__page (id INT AUTO_INCREMENT NOT NULL, site_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, target_id INT DEFAULT NULL, route_name VARCHAR(255) NOT NULL, page_alias VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, position INT NOT NULL, enabled TINYINT(1) NOT NULL, decorate TINYINT(1) NOT NULL, edited TINYINT(1) NOT NULL, name VARCHAR(255) NOT NULL, slug LONGTEXT DEFAULT NULL, url LONGTEXT DEFAULT NULL, custom_url LONGTEXT DEFAULT NULL, request_method VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, meta_keyword VARCHAR(255) DEFAULT NULL, meta_description VARCHAR(255) DEFAULT NULL, javascript LONGTEXT DEFAULT NULL, stylesheet LONGTEXT DEFAULT NULL, raw_headers LONGTEXT DEFAULT NULL, template VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_2FAE39EDF6BD1646 (site_id), INDEX IDX_2FAE39ED727ACA70 (parent_id), INDEX IDX_2FAE39ED158E0B66 (target_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE page__page_audit (id INT NOT NULL, rev INT NOT NULL, site_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, target_id INT DEFAULT NULL, route_name VARCHAR(255) DEFAULT NULL, page_alias VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, position INT DEFAULT NULL, enabled TINYINT(1) DEFAULT NULL, decorate TINYINT(1) DEFAULT NULL, edited TINYINT(1) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, slug LONGTEXT DEFAULT NULL, url LONGTEXT DEFAULT NULL, custom_url LONGTEXT DEFAULT NULL, request_method VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, meta_keyword VARCHAR(255) DEFAULT NULL, meta_description VARCHAR(255) DEFAULT NULL, javascript LONGTEXT DEFAULT NULL, stylesheet LONGTEXT DEFAULT NULL, raw_headers LONGTEXT DEFAULT NULL, template VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE page__snapshot (id INT AUTO_INCREMENT NOT NULL, site_id INT DEFAULT NULL, page_id INT DEFAULT NULL, route_name VARCHAR(255) NOT NULL, page_alias VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, position INT NOT NULL, enabled TINYINT(1) NOT NULL, decorate TINYINT(1) NOT NULL, name VARCHAR(255) NOT NULL, url LONGTEXT DEFAULT NULL, parent_id INT DEFAULT NULL, target_id INT DEFAULT NULL, content LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', publication_date_start DATETIME DEFAULT NULL, publication_date_end DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_3963EF9AF6BD1646 (site_id), INDEX IDX_3963EF9AC4663E4 (page_id), INDEX idx_snapshot_dates_enabled (publication_date_start, publication_date_end, enabled), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE page__snapshot_audit (id INT NOT NULL, rev INT NOT NULL, site_id INT DEFAULT NULL, page_id INT DEFAULT NULL, route_name VARCHAR(255) DEFAULT NULL, page_alias VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, position INT DEFAULT NULL, enabled TINYINT(1) DEFAULT NULL, decorate TINYINT(1) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, url LONGTEXT DEFAULT NULL, parent_id INT DEFAULT NULL, target_id INT DEFAULT NULL, content LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', publication_date_start DATETIME DEFAULT NULL, publication_date_end DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE page__site (id INT AUTO_INCREMENT NOT NULL, enabled TINYINT(1) NOT NULL, name VARCHAR(255) NOT NULL, relative_path VARCHAR(255) DEFAULT NULL, host VARCHAR(255) NOT NULL, enabled_from DATETIME DEFAULT NULL, enabled_to DATETIME DEFAULT NULL, is_default TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, locale VARCHAR(6) DEFAULT NULL, title VARCHAR(64) DEFAULT NULL, meta_keywords VARCHAR(255) DEFAULT NULL, meta_description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE page__site_audit (id INT NOT NULL, rev INT NOT NULL, enabled TINYINT(1) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, relative_path VARCHAR(255) DEFAULT NULL, host VARCHAR(255) DEFAULT NULL, enabled_from DATETIME DEFAULT NULL, enabled_to DATETIME DEFAULT NULL, is_default TINYINT(1) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, locale VARCHAR(6) DEFAULT NULL, title VARCHAR(64) DEFAULT NULL, meta_keywords VARCHAR(255) DEFAULT NULL, meta_description VARCHAR(255) DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE page__bloc (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, page_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, type VARCHAR(64) NOT NULL, settings LONGTEXT NOT NULL COMMENT '(DC2Type:json)', enabled TINYINT(1) DEFAULT NULL, position INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_FCDC1A97727ACA70 (parent_id), INDEX IDX_FCDC1A97C4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE page__bloc_audit (id INT NOT NULL, rev INT NOT NULL, parent_id INT DEFAULT NULL, page_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, type VARCHAR(64) DEFAULT NULL, settings LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', enabled TINYINT(1) DEFAULT NULL, position INT DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE media__gallery (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, context VARCHAR(64) NOT NULL, default_format VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE media__gallery_audit (id INT NOT NULL, rev INT NOT NULL, name VARCHAR(255) DEFAULT NULL, context VARCHAR(64) DEFAULT NULL, default_format VARCHAR(255) DEFAULT NULL, enabled TINYINT(1) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE media__media (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, enabled TINYINT(1) NOT NULL, provider_name VARCHAR(255) NOT NULL, provider_status INT NOT NULL, provider_reference VARCHAR(255) NOT NULL, provider_metadata LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', width INT DEFAULT NULL, height INT DEFAULT NULL, length NUMERIC(10, 0) DEFAULT NULL, content_type VARCHAR(255) DEFAULT NULL, content_size INT DEFAULT NULL, copyright VARCHAR(255) DEFAULT NULL, author_name VARCHAR(255) DEFAULT NULL, context VARCHAR(64) DEFAULT NULL, cdn_is_flushable TINYINT(1) DEFAULT NULL, cdn_flush_at DATETIME DEFAULT NULL, cdn_status INT DEFAULT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_5C6DD74E12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE media__media_audit (id INT NOT NULL, rev INT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, enabled TINYINT(1) DEFAULT NULL, provider_name VARCHAR(255) DEFAULT NULL, provider_status INT DEFAULT NULL, provider_reference VARCHAR(255) DEFAULT NULL, provider_metadata LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', width INT DEFAULT NULL, height INT DEFAULT NULL, length NUMERIC(10, 0) DEFAULT NULL, content_type VARCHAR(255) DEFAULT NULL, content_size INT DEFAULT NULL, copyright VARCHAR(255) DEFAULT NULL, author_name VARCHAR(255) DEFAULT NULL, context VARCHAR(64) DEFAULT NULL, cdn_is_flushable TINYINT(1) DEFAULT NULL, cdn_flush_at DATETIME DEFAULT NULL, cdn_status INT DEFAULT NULL, updated_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE media__gallery_media (id INT AUTO_INCREMENT NOT NULL, gallery_id INT DEFAULT NULL, media_id INT DEFAULT NULL, position INT NOT NULL, enabled TINYINT(1) NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_80D4C5414E7AF8F (gallery_id), INDEX IDX_80D4C541EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE media__gallery_media_audit (id INT NOT NULL, rev INT NOT NULL, gallery_id INT DEFAULT NULL, media_id INT DEFAULT NULL, position INT DEFAULT NULL, enabled TINYINT(1) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE news__post (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, author_id INT DEFAULT NULL, collection_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, abstract LONGTEXT NOT NULL, content LONGTEXT NOT NULL, raw_content LONGTEXT NOT NULL, content_formatter VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, publication_date_start DATETIME DEFAULT NULL, comments_enabled TINYINT(1) NOT NULL, comments_close_at DATETIME DEFAULT NULL, comments_default_status INT NOT NULL, comments_count INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_7D109BC83DA5256D (image_id), INDEX IDX_7D109BC8F675F31B (author_id), INDEX IDX_7D109BC8514956FD (collection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE news__post_tag (post_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_682B20514B89032C (post_id), INDEX IDX_682B2051BAD26311 (tag_id), PRIMARY KEY(post_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE news__post_audit (id INT NOT NULL, rev INT NOT NULL, image_id INT DEFAULT NULL, author_id INT DEFAULT NULL, collection_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, abstract LONGTEXT DEFAULT NULL, content LONGTEXT DEFAULT NULL, raw_content LONGTEXT DEFAULT NULL, content_formatter VARCHAR(255) DEFAULT NULL, enabled TINYINT(1) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, publication_date_start DATETIME DEFAULT NULL, comments_enabled TINYINT(1) DEFAULT NULL, comments_close_at DATETIME DEFAULT NULL, comments_default_status INT DEFAULT NULL, comments_count INT DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE news__comment (id INT AUTO_INCREMENT NOT NULL, post_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, message LONGTEXT NOT NULL, status INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_A90210404B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE news__comment_audit (id INT NOT NULL, rev INT NOT NULL, post_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, message LONGTEXT DEFAULT NULL, status INT DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE notification__message (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, body LONGTEXT NOT NULL COMMENT '(DC2Type:json)', state INT NOT NULL, restart_count INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, started_at DATETIME DEFAULT NULL, completed_at DATETIME DEFAULT NULL, INDEX idx_state (state), INDEX idx_created_at (created_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE notification__message_audit (id INT NOT NULL, rev INT NOT NULL, type VARCHAR(255) DEFAULT NULL, body LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', state INT DEFAULT NULL, restart_count INT DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, started_at DATETIME DEFAULT NULL, completed_at DATETIME DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE classification__collection (id INT AUTO_INCREMENT NOT NULL, context VARCHAR(255) DEFAULT NULL, media_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_A406B56AE25D857E (context), INDEX IDX_A406B56AEA9FDD75 (media_id), UNIQUE INDEX tag_collection (slug, context), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE classification__collection_audit (id INT NOT NULL, rev INT NOT NULL, context VARCHAR(255) DEFAULT NULL, media_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, enabled TINYINT(1) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE classification__tag (id INT AUTO_INCREMENT NOT NULL, context VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_CA57A1C7E25D857E (context), UNIQUE INDEX tag_context (slug, context), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE classification__tag_audit (id INT NOT NULL, rev INT NOT NULL, context VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, enabled TINYINT(1) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE classification__category (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, context VARCHAR(255) DEFAULT NULL, media_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, position INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_43629B36727ACA70 (parent_id), INDEX IDX_43629B36E25D857E (context), INDEX IDX_43629B36EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE classification__category_audit (id INT NOT NULL, rev INT NOT NULL, parent_id INT DEFAULT NULL, context VARCHAR(255) DEFAULT NULL, media_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, enabled TINYINT(1) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, position INT DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE classification__context (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE classification__context_audit (id VARCHAR(255) NOT NULL, rev INT NOT NULL, name VARCHAR(255) DEFAULT NULL, enabled TINYINT(1) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE comment__thread (id VARCHAR(255) NOT NULL, category_id INT DEFAULT NULL, permalink VARCHAR(255) NOT NULL, is_commentable TINYINT(1) NOT NULL, num_comments INT NOT NULL, last_comment_at DATETIME DEFAULT NULL, average_note DOUBLE PRECISION DEFAULT NULL, INDEX IDX_3B60C91012469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE comment__thread_audit (id VARCHAR(255) NOT NULL, rev INT NOT NULL, category_id INT DEFAULT NULL, permalink VARCHAR(255) DEFAULT NULL, is_commentable TINYINT(1) DEFAULT NULL, num_comments INT DEFAULT NULL, last_comment_at DATETIME DEFAULT NULL, average_note DOUBLE PRECISION DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE comment__comment (id INT AUTO_INCREMENT NOT NULL, thread_id VARCHAR(255) DEFAULT NULL, body LONGTEXT NOT NULL, ancestors VARCHAR(1024) NOT NULL, depth INT NOT NULL, created_at DATETIME NOT NULL, state INT NOT NULL, author_name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, note DOUBLE PRECISION DEFAULT NULL, private TINYINT(1) DEFAULT NULL, INDEX IDX_FD78D017E2904019 (thread_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE comment__comment_audit (id INT NOT NULL, rev INT NOT NULL, thread_id VARCHAR(255) DEFAULT NULL, body LONGTEXT DEFAULT NULL, ancestors VARCHAR(1024) DEFAULT NULL, depth INT DEFAULT NULL, created_at DATETIME DEFAULT NULL, state INT DEFAULT NULL, author_name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, note DOUBLE PRECISION DEFAULT NULL, private TINYINT(1) DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE timeline__action_component (id INT AUTO_INCREMENT NOT NULL, action_id INT DEFAULT NULL, component_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, text VARCHAR(255) DEFAULT NULL, INDEX IDX_6ACD1B169D32F035 (action_id), INDEX IDX_6ACD1B16E2ABAFFF (component_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE timeline__component (id INT AUTO_INCREMENT NOT NULL, model VARCHAR(255) NOT NULL, identifier LONGTEXT NOT NULL COMMENT '(DC2Type:array)', hash VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1B2F01CDD1B862B8 (hash), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE timeline__timeline (id INT AUTO_INCREMENT NOT NULL, action_id INT DEFAULT NULL, subject_id INT DEFAULT NULL, context VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_FFBC6AD59D32F035 (action_id), INDEX IDX_FFBC6AD523EDC87 (subject_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE timeline__action (id INT AUTO_INCREMENT NOT NULL, verb VARCHAR(255) NOT NULL, status_current VARCHAR(255) NOT NULL, status_wanted VARCHAR(255) NOT NULL, duplicate_key VARCHAR(255) DEFAULT NULL, duplicate_priority INT DEFAULT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE fos_group (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT '(DC2Type:array)', UNIQUE INDEX UNIQ_4B019DDB5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE fos_group_audit (id INT NOT NULL, rev INT NOT NULL, name VARCHAR(255) DEFAULT NULL, roles LONGTEXT DEFAULT NULL COMMENT '(DC2Type:array)', revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE fos_user_user_group (user_id INT NOT NULL, group_id INT NOT NULL, INDEX IDX_B3C77447A76ED395 (user_id), INDEX IDX_B3C77447FE54D947 (group_id), PRIMARY KEY(user_id, group_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE user_audit (id INT NOT NULL, rev INT NOT NULL, username VARCHAR(255) DEFAULT NULL, username_canonical VARCHAR(255) DEFAULT NULL, enabled TINYINT(1) DEFAULT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) DEFAULT NULL, expired TINYINT(1) DEFAULT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT DEFAULT NULL COMMENT '(DC2Type:array)', credentials_expired TINYINT(1) DEFAULT NULL, credentials_expire_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, date_of_birth DATETIME DEFAULT NULL, firstname VARCHAR(64) DEFAULT NULL, lastname VARCHAR(64) DEFAULT NULL, website VARCHAR(64) DEFAULT NULL, biography VARCHAR(1000) DEFAULT NULL, gender VARCHAR(1) DEFAULT NULL, locale VARCHAR(8) DEFAULT NULL, timezone VARCHAR(64) DEFAULT NULL, phone VARCHAR(64) DEFAULT NULL, facebook_uid VARCHAR(255) DEFAULT NULL, facebook_name VARCHAR(255) DEFAULT NULL, facebook_data LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', twitter_uid VARCHAR(255) DEFAULT NULL, twitter_name VARCHAR(255) DEFAULT NULL, twitter_data LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', gplus_uid VARCHAR(255) DEFAULT NULL, gplus_name VARCHAR(255) DEFAULT NULL, gplus_data LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', token VARCHAR(255) DEFAULT NULL, two_step_code VARCHAR(255) DEFAULT NULL, user_id INT DEFAULT NULL, auth_source VARCHAR(50) DEFAULT NULL, status INT DEFAULT NULL, official_code VARCHAR(40) DEFAULT NULL, picture_uri VARCHAR(250) DEFAULT NULL, creator_id INT DEFAULT NULL, competences LONGTEXT DEFAULT NULL, diplomas LONGTEXT DEFAULT NULL, openarea LONGTEXT DEFAULT NULL, teach LONGTEXT DEFAULT NULL, productions VARCHAR(250) DEFAULT NULL, chatcall_user_id INT DEFAULT NULL, chatcall_date DATETIME DEFAULT NULL, chatcall_text VARCHAR(50) DEFAULT NULL, language VARCHAR(40) DEFAULT NULL, registration_date DATETIME DEFAULT NULL, expiration_date DATETIME DEFAULT NULL, active TINYINT(1) DEFAULT NULL, openid VARCHAR(255) DEFAULT NULL, theme VARCHAR(255) DEFAULT NULL, hr_dept_id SMALLINT DEFAULT NULL, isActive VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, emailCanonical VARCHAR(255) DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
$queries->addQuery("CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, thread_id INT DEFAULT NULL, sender_id INT DEFAULT NULL, body LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_B6BD307FE2904019 (thread_id), INDEX IDX_B6BD307FF624B39D (sender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
    $queries->addQuery("CREATE TABLE thread_metadata (id INT AUTO_INCREMENT NOT NULL, thread_id INT DEFAULT NULL, participant_id INT DEFAULT NULL, is_deleted TINYINT(1) NOT NULL, last_participant_message_date DATETIME DEFAULT NULL, last_message_date DATETIME DEFAULT NULL, INDEX IDX_40A577C8E2904019 (thread_id), INDEX IDX_40A577C89D1C3019 (participant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
    $queries->addQuery("CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, thread_id INT DEFAULT NULL, body LONGTEXT NOT NULL, ancestors VARCHAR(1024) NOT NULL, depth INT NOT NULL, created_at DATETIME NOT NULL, state INT NOT NULL, INDEX IDX_9474526CE2904019 (thread_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
    $queries->addQuery("CREATE TABLE thread (id INT AUTO_INCREMENT NOT NULL, subject VARCHAR(255) NOT NULL, createdAt DATETIME NOT NULL, isSpam TINYINT(1) NOT NULL, createdBy_id INT DEFAULT NULL, INDEX IDX_31204C833174800F (createdBy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
    $queries->addQuery("CREATE TABLE message_metadata (id INT AUTO_INCREMENT NOT NULL, message_id INT DEFAULT NULL, participant_id INT DEFAULT NULL, is_read TINYINT(1) NOT NULL, INDEX IDX_4632F005537A1329 (message_id), INDEX IDX_4632F0059D1C3019 (participant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
    $queries->addQuery("CREATE TABLE migrations (id INT AUTO_INCREMENT NOT NULL, bundle VARCHAR(250) NOT NULL, version VARCHAR(250) NOT NULL, loaded_at DATETIME NOT NULL, INDEX idx_oro_migrations (bundle), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
    $queries->addQuery("CREATE TABLE migrations_data (id INT AUTO_INCREMENT NOT NULL, class_name VARCHAR(255) NOT NULL, version VARCHAR(255) DEFAULT NULL, loaded_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
    $queries->addQuery("CREATE TABLE sylius_settings_parameter (id INT AUTO_INCREMENT NOT NULL, namespace VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, value LONGTEXT DEFAULT NULL COMMENT '(DC2Type:object)', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
    $queries->addQuery("CREATE TABLE revisions (id INT AUTO_INCREMENT NOT NULL, timestamp DATETIME NOT NULL, username VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
    $queries->addQuery("CREATE TABLE acl_classes (id INT UNSIGNED AUTO_INCREMENT NOT NULL, class_type VARCHAR(200) NOT NULL, UNIQUE INDEX UNIQ_69DD750638A36066 (class_type), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
    $queries->addQuery("CREATE TABLE acl_security_identities (id INT UNSIGNED AUTO_INCREMENT NOT NULL, identifier VARCHAR(200) NOT NULL, username TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8835EE78772E836AF85E0677 (identifier, username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
    $queries->addQuery("CREATE TABLE acl_object_identities (id INT UNSIGNED AUTO_INCREMENT NOT NULL, parent_object_identity_id INT UNSIGNED DEFAULT NULL, class_id INT UNSIGNED NOT NULL, object_identifier VARCHAR(100) NOT NULL, entries_inheriting TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_9407E5494B12AD6EA000B10 (object_identifier, class_id), INDEX IDX_9407E54977FA751A (parent_object_identity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
    $queries->addQuery("CREATE TABLE acl_object_identity_ancestors (object_identity_id INT UNSIGNED NOT NULL, ancestor_id INT UNSIGNED NOT NULL, INDEX IDX_825DE2993D9AB4A6 (object_identity_id), INDEX IDX_825DE299C671CEA1 (ancestor_id), PRIMARY KEY(object_identity_id, ancestor_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
    $queries->addQuery("CREATE TABLE acl_entries (id INT UNSIGNED AUTO_INCREMENT NOT NULL, class_id INT UNSIGNED NOT NULL, object_identity_id INT UNSIGNED DEFAULT NULL, security_identity_id INT UNSIGNED NOT NULL, field_name VARCHAR(50) DEFAULT NULL, ace_order SMALLINT UNSIGNED NOT NULL, mask INT NOT NULL, granting TINYINT(1) NOT NULL, granting_strategy VARCHAR(30) NOT NULL, audit_success TINYINT(1) NOT NULL, audit_failure TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_46C8B806EA000B103D9AB4A64DEF17BCE4289BF4 (class_id, object_identity_id, field_name, ace_order), INDEX IDX_46C8B806EA000B103D9AB4A6DF9183C9 (class_id, object_identity_id, security_identity_id), INDEX IDX_46C8B806EA000B10 (class_id), INDEX IDX_46C8B8063D9AB4A6 (object_identity_id), INDEX IDX_46C8B806DF9183C9 (security_identity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");


    }

    public function down(Schema $schema, QueryBag $queries)
    {
        $queries->addQuery("ALTER TABLE page__page DROP FOREIGN KEY FK_2FAE39ED727ACA70");
        $queries->addQuery("ALTER TABLE page__page DROP FOREIGN KEY FK_2FAE39ED158E0B66");
        $queries->addQuery("ALTER TABLE page__snapshot DROP FOREIGN KEY FK_3963EF9AC4663E4");
        $queries->addQuery("ALTER TABLE page__bloc DROP FOREIGN KEY FK_FCDC1A97C4663E4");
        $queries->addQuery("ALTER TABLE page__page DROP FOREIGN KEY FK_2FAE39EDF6BD1646");
        $queries->addQuery("ALTER TABLE page__snapshot DROP FOREIGN KEY FK_3963EF9AF6BD1646");
        $queries->addQuery("ALTER TABLE page__bloc DROP FOREIGN KEY FK_FCDC1A97727ACA70");
        $queries->addQuery("ALTER TABLE media__gallery_media DROP FOREIGN KEY FK_80D4C5414E7AF8F");
        $queries->addQuery("ALTER TABLE media__gallery_media DROP FOREIGN KEY FK_80D4C541EA9FDD75");
        $queries->addQuery("ALTER TABLE news__post DROP FOREIGN KEY FK_7D109BC83DA5256D");
        $queries->addQuery("ALTER TABLE classification__collection DROP FOREIGN KEY FK_A406B56AEA9FDD75");
        $queries->addQuery("ALTER TABLE classification__category DROP FOREIGN KEY FK_43629B36EA9FDD75");
        $queries->addQuery("ALTER TABLE news__post_tag DROP FOREIGN KEY FK_682B20514B89032C");
        $queries->addQuery("ALTER TABLE news__comment DROP FOREIGN KEY FK_A90210404B89032C");
        $queries->addQuery("ALTER TABLE news__post DROP FOREIGN KEY FK_7D109BC8514956FD");
        $queries->addQuery("ALTER TABLE news__post_tag DROP FOREIGN KEY FK_682B2051BAD26311");
        $queries->addQuery("ALTER TABLE classification__category DROP FOREIGN KEY FK_43629B36727ACA70");
        $queries->addQuery("ALTER TABLE comment__thread DROP FOREIGN KEY FK_3B60C91012469DE2");
        $queries->addQuery("ALTER TABLE comment__comment DROP FOREIGN KEY FK_FD78D017E2904019");
        $queries->addQuery("ALTER TABLE timeline__action_component DROP FOREIGN KEY FK_6ACD1B16E2ABAFFF");
        $queries->addQuery("ALTER TABLE timeline__timeline DROP FOREIGN KEY FK_FFBC6AD523EDC87");
        $queries->addQuery("ALTER TABLE timeline__action_component DROP FOREIGN KEY FK_6ACD1B169D32F035");
        $queries->addQuery("ALTER TABLE timeline__timeline DROP FOREIGN KEY FK_FFBC6AD59D32F035");
        $queries->addQuery("ALTER TABLE fos_user_user_group DROP FOREIGN KEY FK_B3C77447FE54D947");
        $queries->addQuery("ALTER TABLE message_metadata DROP FOREIGN KEY FK_4632F005537A1329");
        $queries->addQuery("ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FE2904019");
        $queries->addQuery("ALTER TABLE thread_metadata DROP FOREIGN KEY FK_40A577C8E2904019");
        $queries->addQuery("ALTER TABLE comment DROP FOREIGN KEY FK_9474526CE2904019");
        $queries->addQuery("ALTER TABLE acl_entries DROP FOREIGN KEY FK_46C8B806EA000B10");
        $queries->addQuery("ALTER TABLE acl_entries DROP FOREIGN KEY FK_46C8B806DF9183C9");
        $queries->addQuery("ALTER TABLE acl_object_identities DROP FOREIGN KEY FK_9407E54977FA751A");
        $queries->addQuery("ALTER TABLE acl_object_identity_ancestors DROP FOREIGN KEY FK_825DE2993D9AB4A6");
        $queries->addQuery("ALTER TABLE acl_object_identity_ancestors DROP FOREIGN KEY FK_825DE299C671CEA1");
        $queries->addQuery("ALTER TABLE acl_entries DROP FOREIGN KEY FK_46C8B8063D9AB4A6");
        //$queries->addQuery("CREATE TABLE oro_migrations (id INT AUTO_INCREMENT NOT NULL, bundle VARCHAR(250) NOT NULL, version VARCHAR(250) NOT NULL, loaded_at DATETIME NOT NULL, INDEX idx_oro_migrations (bundle), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        //$queries->addQuery("CREATE TABLE oro_migrations_data (id INT AUTO_INCREMENT NOT NULL, class_name VARCHAR(255) NOT NULL, loaded_at DATETIME NOT NULL, version VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $queries->addQuery("DROP TABLE page__page");
        $queries->addQuery("DROP TABLE page__page_audit");
        $queries->addQuery("DROP TABLE page__snapshot");
        $queries->addQuery("DROP TABLE page__snapshot_audit");
        $queries->addQuery("DROP TABLE page__site");
        $queries->addQuery("DROP TABLE page__site_audit");
        $queries->addQuery("DROP TABLE page__bloc");
        $queries->addQuery("DROP TABLE page__bloc_audit");
        $queries->addQuery("DROP TABLE media__gallery");
        $queries->addQuery("DROP TABLE media__gallery_audit");
        $queries->addQuery("DROP TABLE media__media");
        $queries->addQuery("DROP TABLE media__media_audit");
        $queries->addQuery("DROP TABLE media__gallery_media");
        $queries->addQuery("DROP TABLE media__gallery_media_audit");
        $queries->addQuery("DROP TABLE news__post");
        $queries->addQuery("DROP TABLE news__post_tag");
        $queries->addQuery("DROP TABLE news__post_audit");
        $queries->addQuery("DROP TABLE news__comment");
        $queries->addQuery("DROP TABLE news__comment_audit");
        $queries->addQuery("DROP TABLE notification__message");
        $queries->addQuery("DROP TABLE notification__message_audit");
        $queries->addQuery("DROP TABLE classification__collection");
        $queries->addQuery("DROP TABLE classification__collection_audit");
        $queries->addQuery("DROP TABLE classification__tag");
        $queries->addQuery("DROP TABLE classification__tag_audit");
        $queries->addQuery("DROP TABLE classification__category");
        $queries->addQuery("DROP TABLE classification__category_audit");
        $queries->addQuery("DROP TABLE comment__thread");
        $queries->addQuery("DROP TABLE comment__thread_audit");
        $queries->addQuery("DROP TABLE comment__comment");
        $queries->addQuery("DROP TABLE comment__comment_audit");
        $queries->addQuery("DROP TABLE timeline__action_component");
        $queries->addQuery("DROP TABLE timeline__component");
        $queries->addQuery("DROP TABLE timeline__timeline");
        $queries->addQuery("DROP TABLE timeline__action");
        $queries->addQuery("DROP TABLE fos_group");
        $queries->addQuery("DROP TABLE fos_group_audit");
        $queries->addQuery("DROP TABLE fos_user_user_group");
        $queries->addQuery("DROP TABLE user_audit");
        $queries->addQuery("DROP TABLE message");
        $queries->addQuery("DROP TABLE thread_metadata");
        $queries->addQuery("DROP TABLE comment");
        $queries->addQuery("DROP TABLE thread");
        $queries->addQuery("DROP TABLE message_metadata");
        $queries->addQuery("DROP TABLE migrations");
        $queries->addQuery("DROP TABLE migrations_data");
        $queries->addQuery("DROP TABLE sylius_settings_parameter");
        $queries->addQuery("DROP TABLE revisions");
        $queries->addQuery("DROP TABLE acl_classes");
        $queries->addQuery("DROP TABLE acl_security_identities");
        $queries->addQuery("DROP TABLE acl_object_identities");
        $queries->addQuery("DROP TABLE acl_object_identity_ancestors");
        $queries->addQuery("DROP TABLE acl_entries");
    }
}
