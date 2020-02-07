-- Create the account table
CREATE TABLE account (
   account_id  SERIAL         NOT NULL PRIMARY KEY,
   username    VARCHAR(50)    NOT NULL,
   password    VARCHAR(50)    NOT NULL,
   email       VARCHAR(100)   NOT NULL
);

-- Insert admin account into the table
INSERT INTO account (
   username,
   password,
   email
) VALUES (
   'admin',
   'password',
   'N/A'
);