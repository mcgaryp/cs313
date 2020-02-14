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
