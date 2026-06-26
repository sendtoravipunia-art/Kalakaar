-- Portfolio
CREATE TABLE IF NOT EXISTS portfolio_items (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    artist_id INT UNSIGNED NOT NULL,
    title VARCHAR(140) NOT NULL,
    media_type VARCHAR(20) NOT NULL,
    url VARCHAR(255) NOT NULL,
    description TEXT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_portfolio_items_artist_id (artist_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
