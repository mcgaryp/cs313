-- INSERTING Movies for the admin

insert into movie (
   image,
   title,
   description,
   rating,
   year
) values (
   'https://usercontent2.hubstatic.com/12447625_f520.jpg',
   'Lord of the Rings: Fellowship of the Ring',
   'The future of civilization rests in the fate of the One Ring, which has been lost for centuries. Powerful forces are unrelenting in their search for it. But fate has placed it in the hands of a young Hobbit named Frodo Baggins (Elijah Wood), who inherits the Ring and steps into legend. A daunting task lies ahead for Frodo when he becomes the Ringbearer - to destroy the One Ring in the fires of Mount Doom where it was forged.',
   'PG-13',
   2001
);

insert into movie (
   image,
   title,
   description,
   rating,
   year
)
values (
   'https://img01.mgo-images.com/image/thumbnail/v2/content/1MV0c3d6cd1783c58c16b99f0df47a29dec.jpeg',
   'Lord of the Rings: The Two Towers',
   'The sequel to the Golden Globe-nominated and AFI Award-winning "The Lord of the Rings: The Fellowship of the Ring," "The Two Towers" follows the continuing quest of Frodo (Elijah Wood) and the Fellowship to destroy the One Ring. Frodo and Sam (Sean Astin) discover they are being followed by the mysterious Gollum. Aragorn (Viggo Mortensen), the Elf archer Legolas and Gimli the Dwarf encounter the besieged Rohan kingdom, whose once great King Theoden has fallen under Saruman`s deadly spell.',
   'PG-13',
   2002
);

insert into movie (
   image,
   title,
   description,
   rating,
   year
)
values (
   'https://m.media-amazon.com/images/M/MV5BNzA5ZDNlZWMtM2NhNS00NDJjLTk4NDItYTRmY2EwMWZlMTY3XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg',
   'Lord of the Rings: Return of the King',
   'The culmination of nearly 10 years` work and conclusion to Peter Jackson`s epic trilogy based on the timeless J.R.R. Tolkien classic, "The Lord of the Rings: The Return of the King" presents the final confrontation between the forces of good and evil fighting for control of the future of Middle-earth. Hobbits Frodo and Sam reach Mordor in their quest to destroy the `one ring`, while Aragorn leads the forces of good against Sauron`s evil army at the stone city of Minas Tirith.',
   'PG-13',
   2003
);

insert into movie (
   image,
   title,
   description,
   rating,
   year
)
values (
   'https://m.media-amazon.com/images/M/MV5BNmJjNTQzMjctMmE2NS00ZmYxLWE1NjYtYmRmNjNiMzljOTc3XkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_UY1200_CR90,0,630,1200_AL_.jpg',
   'Hook',
   'When his young children are abducted by his old nemesis, Capt. Hook (Dustin Hoffman), middle-aged lawyer Peter Banning (Robin Williams) returns to his magical origins as Peter Pan. Peter must revisit a foggy past in which he abandoned Neverland for family life, leaving Tinkerbell (Julia Roberts) and the Lost Boys to fend for themselves. Given their bitterness toward Peter for growing up -- and their allegiance to their new leader, Rufio -- the old gang may not be happy to see him.',
   'PG',
   1991
);

insert into movie (
   image,
   title,
   description,
   rating,
   year
)
values (
   'https://images-na.ssl-images-amazon.com/images/I/81KxvWNEkCL._SY445_.jpg',
   'Peter Pan',
   'In this Disney animated film, Wendy (Kathryn Beaumont) and her two brothers are amazed when a magical boy named Peter Pan (Bobby Driscoll) flies into their bedroom, supposedly in pursuit of his rebellious shadow. He and his fairy friend, Tinkerbell, come from a far-off place called Neverland, where children stay perpetually young. Enchanted, the kids follow him back. But when Pan`s nemesis, the pirate Captain Hook (Hans Conried), causes trouble, the kids begin to miss their old life.',
   'PG',
   1953  
);

insert into movie (
   image,
   title,
   description,
   rating,
   year
)
values (
   'https://target.scene7.com/is/image/Target/GUEST_07ddbb49-099b-4230-8d98-f4282e746cfd?wid=488&hei=488&fmt=pjpeg',
   'Mrs. Doubtfire',
   'Troubled that he has little access to his children, divorced Daniel Hillard (Robin Williams) hatches an elaborate plan. With help from his creative brother Frank (Harvey Fierstein), he dresses as an older British woman and convinces his ex-wife, Miranda (Sally Field), to hire him as a nanny. "Mrs. Doubtfire" wins over the children and helps Daniel become a better parent -- but when both Daniel and his nanny persona must meet different parties at the same restaurant, his secrets may be exposed.',
   'PG-13',
   1993
);

-- CREATE ACCOUNT WITH PORTER
insert into account (
   username,
   password,
   email
) values (
   'porter',
   'password',
   'portermcgary@gmail.com'
);

-- ATTACHING MOVIES TO ACCOUNT WITH MOVIE GROUP
insert into movie_group (
   movie_id,
   account_id
) values (
   (SELECT movie_id
      FROM movie
      WHERE title = 'Mrs. Doubtfire'),
   (SELECT account_id
      FROM account
      WHERE username = 'porter')
);

insert into movie_group (
   movie_id,
   account_id
) values (
   (SELECT movie_id
      FROM movie
      WHERE title = 'Lord of the Rings: Fellowship of the Ring'),
   (SELECT account_id
      FROM account
      WHERE username = 'porter')
);

insert into movie_group (
   movie_id,
   account_id
) values (
   (SELECT movie_id
      FROM movie
      WHERE title = 'Lord of the Rings: Return of the King'),
   (SELECT account_id
      FROM account
      WHERE username = 'porter')
);

insert into movie_group (
   movie_id,
   account_id
) values (
   (SELECT movie_id
      FROM movie
      WHERE title = 'Lord of the Rings: The Two Towers'),
   (SELECT account_id
      FROM account
      WHERE username = 'porter')
);

insert into movie_group (
   movie_id,
   account_id
) values (
   (SELECT movie_id
      FROM movie
      WHERE title = 'Peter Pan'),
   (SELECT account_id
      FROM account
      WHERE username = 'porter')
);

insert into movie_group (
   movie_id,
   account_id
) values (
   (SELECT movie_id
      FROM movie
      WHERE title = 'Hook'),
   (SELECT account_id
      FROM account
      WHERE username = 'porter')
);

-- CREATE USER_PROFILE WITH PO & LALA
insert into user_profile (
   account_id,
   nick_name
) values (
   (SELECT account_id
      FROM account
      WHERE username = 'porter' 
      AND email = 'portermcgary@gmail.com'),
   'Po'
);

insert into user_profile (
   account_id,
   nick_name
) values (
   (SELECT account_id
      FROM account
      WHERE username = 'porter' 
      AND email = 'portermcgary@gmail.com'),
   'Lala'
);