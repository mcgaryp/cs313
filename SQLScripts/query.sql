select * from common_lookup;
select movie_id, title, rating from movie;
select * from account;
select * from movie_group;
select * from user_profile;

select * from movie m inner join movie_group mg on m.movie_id = mg.movie_id and mg.account_id = 2;