-- Artist Profiles
CREATE TABLE IF NOT EXISTS artist_profiles (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id INT UNSIGNED NOT NULL,
    category_id INT UNSIGNED NOT NULL,
    headline VARCHAR(140) NOT NULL,
    bio TEXT NULL,
    city VARCHAR(80) NULL,
    hourly_rate DECIMAL(10,2) NULL,
    experience_years INT NULL,
    available TINYINT(1) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_artist_profiles_user_id (user_id),
    KEY idx_artist_profiles_category_id (category_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
