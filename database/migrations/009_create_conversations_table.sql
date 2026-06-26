-- Conversations
CREATE TABLE IF NOT EXISTS conversations (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    producer_id INT UNSIGNED NOT NULL,
    artist_id INT UNSIGNED NOT NULL,
    subject VARCHAR(140) NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_conversations_producer_id (producer_id),
    KEY idx_conversations_artist_id (artist_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
