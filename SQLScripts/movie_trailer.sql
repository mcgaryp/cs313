-- Create movie mp4 table
CREATE TABLE movie_trailer (
   movie_trailer_id SERIAL NOT NULL PRIMARY KEY,
   mp4 VARCHAR(100) NOT NULL
);

-- Insert mp4
INSERT INTO movie_trailer (
   movie_trailer_id,
   mp4
) VALUES (
   1,
   'N/A'
);