-- Create profile table for different profiles in each account
CREATE TABLE user_profile (
   profile_id     SERIAL      NOT NULL PRIMARY KEY,
   account_id     INT         NOT NULL REFERENCES account(account_id),
   -- icon           INT         NOT NULL REFERENCES icon(icon_id),
   nick_name      VARCHAR(25) NOT NULL
);

-- Insert admin profile
INSERT INTO user_profile (
   account_id,
   -- icon,
   nick_name
) VALUES (
   -- have a common look up table for the admin?
   -- admin account id
   to_number((SELECT meaning
   FROM common_lookup
   WHERE context = 'ADMIN ACCOUNT ID'), '9'),
   -- (SELECT icon_id
   --    FROM icon
   --    WHERE icon_name = 'ADMIN'),
   -- --  admin nickname
   'admin'
);