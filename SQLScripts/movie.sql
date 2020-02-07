-- Create movie Table
CREATE TABLE movie (
   movie_id SERIAL NOT NULL PRIMARY KEY,
   -- movie_mp4_id INT NOT NULL REFERENCES movie_mp4(movie_mp4_id),
   -- movie_trailer_id INT NOT NULL REFERENCES movie_trailer(movie_trailer_id),
   image TEXT NOT NULL,
   title VARCHAR(255) NOT NULL,
   description TEXT NOT NULL,
   rating VARCHAR(10) NOT NULL,
   year INT NOT NULL
);

-- Insert Admin movies
INSERT INTO movie (
   -- movie_mp4_id,
   -- movie_trailer_id,
   image,
   title,
   description,
   rating,
   year
) VALUES (
   -- 1,
   -- 1,
   'No Image',
   'No Title',
   'No Description',
   'No Rating',
   2020
);