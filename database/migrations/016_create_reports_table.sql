-- Reports
CREATE TABLE IF NOT EXISTS reports (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    reporter_id INT UNSIGNED NOT NULL,
    target_type VARCHAR(40) NOT NULL,
    target_id INT UNSIGNED NOT NULL,
    reason VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_reports_reporter_id (reporter_id),
    KEY idx_reports_target_id (target_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
