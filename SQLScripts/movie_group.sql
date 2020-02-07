-- Create movie group table
CREATE TABLE movie_group (
   movie_group_id SERIAL   NOT NULL PRIMARY KEY,
   movie_id       INT      NOT NULL REFERENCES movie(movie_id),
   account_id     INT      NOT NULL REFERENCES account(account_id)
);

-- Insert movie group key pair of admin
INSERT INTO movie_group (
   movie_id,
   account_id
) VALUES (
   to_number((SELECT meaning
   FROM common_lookup
   WHERE context = 'ADMIN MOVIE ID'), '9'),
   to_number((SELECT meaning
   FROM common_lookup
   WHERE context = 'ADMIN ACCOUNT ID'),'9')
);