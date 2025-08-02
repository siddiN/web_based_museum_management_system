CREATE TABLE IF NOT EXISTS has (
   
    object_id INT(11),
    member_id INT(11),
    FOREIGN KEY (object_id) REFERENCES objects(object_id),
    FOREIGN KEY (member_id) REFERENCES members(member_id)
);
