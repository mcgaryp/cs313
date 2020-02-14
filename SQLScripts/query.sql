select * from common_lookup;
select movie_id, title, rating from movie;
select * from account;
select * from movie_group;
select * from user_profile;

select title, rating, year from movie m inner join movie_group mg on m.movie_id = mg.movie_id and mg.account_id = 2;

select up.nick_name from account a inner join user_profile up on up.account_id = a.account_id and a.account_id = 2;

SELECT * FROM account a WHERE a.username = 'porter' AND a.password = 'password';

SELECT * FROM common_lookup WHERE context = 'RATING';

SELECT m.movie_id, title, rating FROM movie m inner join movie_group mg on title LIKE '%Lord%' and mg.account_id = 2 and m.movie_id = mg.movie_id;



SELECT title, rating, year FROM movie WHERE movie_id = 5;
SELECT * FROM movie_group WHERE movie_id = 5 AND account_id = 1;

DELETE FROM movie_group WHERE movie_id = 5 AND account_id = 1;
-- DELETE FROM movie WHERE movie_id = 5;

SELECT title, rating, year FROM movie Where title ILIKE '%lord%';
SELECT * FROM movie_group;

SELECT * FROM movie WHERE title iLIKE '%lord%';
-- OR image iLIKE '%lord%' OR description iLIKE '%lord%' OR rating iLIKE '%lord%' OR year iLIKE '%lord%';