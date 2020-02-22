select * from common_lookup;
select movie_id,account_id, title, rating from movie;
select * from account;
-- select * from movie_group;
select * from user_profile;

-- Selects the movies to display on the home page
select title, rating, year, account_id from movie where account_id = 2;

-- selects the profiles
select up.nick_name from account a inner join user_profile up on up.account_id = a.account_id and a.account_id = 2;

-- selects account with confirming password and username
SELECT * FROM account a WHERE a.username = 'porter' AND a.password = 'password';

-- looks up rating for inserting into html
SELECT * FROM common_lookup WHERE context = 'RATING';

-- selects the movies based on movie id
SELECT title, rating, year, account_id FROM movie WHERE movie_id = 5;

-- Deletes movie based on id and account
DELETE FROM movie WHERE movie_id = 8 AND account_id = 1;

-- Searches for specific movies in an account
SELECT movie_id, account_id, title, rating, year FROM movie WHERE title ILIKE '%or%' AND account_id = 2;