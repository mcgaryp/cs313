CREATE TABLE icon (
   icon_id     SERIAL         NOT NULL PRIMARY KEY,
   url_path    VARCHAR(100)   NOT NULL,
   icon_name   VARCHAR(100)   NOT NULL
);

INSERT INTO icon (
   url_path,
   icon_name
) VALUES (
   'somePathInTheServer',
   'ADMIN'
);