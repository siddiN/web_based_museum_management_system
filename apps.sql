CREATE TABLE IF NOT EXISTS appraisals (
    appraisal_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    object_id INT(11),
    appraiser_name VARCHAR(255) NOT NULL,
    appraisal_date DATE NOT NULL,
    reason VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    FOREIGN KEY (object_id) REFERENCES objects(object_id)
);
