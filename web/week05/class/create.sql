DROP TABLE IF EXISTS relationships CASCADE;
DROP TABLE IF EXISTS family_members CASCADE;

CREATE TABLE relationships (
   id    SERIAL      NOT NULL PRIMARY KEY,
   description    VARCHAR(100)   NOT NULL
);

CREATE TABLE family_members (
   id          SERIAL NOT NULL PRIMARY KEY,
   first_name  VARCHAR(100) NOT NULL,
   last_name   VARCHAR(100) NOT NULL,
   relationships_id INT NOT NULL REFERENCES relationships(id)
);

INSERT INTO relationships (description) VALUES ('Mother');
INSERT INTO relationships (description) VALUES ('Father');
INSERT INTO relationships (description) VALUES ('Wife');
INSERT INTO relationships (description) VALUES ('Husband');
INSERT INTO relationships (description) VALUES ('Son');
INSERT INTO relationships (description) VALUES ('Daughter');

(SELECT id, relationships
      FROM relationships
      WHERE description = 'Wife');

INSERT INTO family_members (
   first_name,
   last_name,
   relationships_id
) VALUES (
   'Makayla',
   'McGary',
   (SELECT id
      FROM relationships
      WHERE description = 'Wife')
);

INSERT INTO family_members (
   first_name,
   last_name,
   relationships_id
) VALUES (
   'Heather',
   'McGary',
   (SELECT id
      FROM relationships
      WHERE description = 'Mother')
);

INSERT INTO family_members (
   first_name,
   last_name,
   relationships_id
) VALUES (
   'Dustin',
   'McGary',
   (SELECT id
      FROM relationships
      WHERE description = 'Father')
);

SELECT * FROM family_members;