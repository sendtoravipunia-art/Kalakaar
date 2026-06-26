-- Saved Artists
CREATE TABLE IF NOT EXISTS saved_artists (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    producer_id INT UNSIGNED NOT NULL,
    artist_id INT UNSIGNED NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_saved_artists_producer_id (producer_id),
    KEY idx_saved_artists_artist_id (artist_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
