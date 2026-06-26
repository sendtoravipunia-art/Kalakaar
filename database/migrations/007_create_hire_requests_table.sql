-- Hire Requests
CREATE TABLE IF NOT EXISTS hire_requests (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    producer_id INT UNSIGNED NOT NULL,
    artist_id INT UNSIGNED NOT NULL,
    title VARCHAR(140) NOT NULL,
    message TEXT NULL,
    budget DECIMAL(10,2) NULL,
    status VARCHAR(20) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_hire_requests_producer_id (producer_id),
    KEY idx_hire_requests_artist_id (artist_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
