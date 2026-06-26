-- Artist Skills
CREATE TABLE IF NOT EXISTS artist_skills (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    artist_id INT UNSIGNED NOT NULL,
    skill_id INT UNSIGNED NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_artist_skills_artist_id (artist_id),
    KEY idx_artist_skills_skill_id (skill_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
