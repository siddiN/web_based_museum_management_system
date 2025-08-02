CREATE TABLE IF NOT EXISTS answers (
    object_id INT(11),
    visitor_id INT(11),
    FOREIGN KEY (object_id) REFERENCES objects(object_id),
    FOREIGN KEY (visitor_id) REFERENCES visitors(visitor_id)
);
