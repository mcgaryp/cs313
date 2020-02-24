-- Create common Look up table
CREATE TABLE common_lookup (
   common_lookup_id  SERIAL      NOT NULL PRIMARY KEY,
   context           VARCHAR(25) NOT NULL,
   type              VARCHAR(25) NOT NULL,
   meaning           VARCHAR(256) NOT NULL
);

-- TODO Insert admin into common look up table
INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ADMIN ACCOUNT ID',
   'INT',
   1
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ADMIN MOVIE GROUP ID',
   'INT',
   1
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ADMIN MOVIE ID',
   'INT',
   1
);

-- MOVIE RATINGS 
INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'RATING',
   'STRING',
   'G'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'RATING',
   'STRING',
   'PG'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'RATING',
   'STRING',
   'PG-13'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'RATING',
   'STRING',
   'R'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'RATING',
   'STRING',
   'NC-17'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'RATING',
   'STRING',
   'TV-Y'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'RATING',
   'STRING',
   'TV-Y7'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'RATING',
   'STRING',
   'TV-G'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'RATING',
   'STRING',
   'TV-PG'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'RATING',
   'STRING',
   'TV-14'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'RATING',
   'STRING',
   'TV-MA'
);

-- 
-- ICONS that will be avaliable 
INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ICON',
   'Iron Man',
   'http://icons.iconarchive.com/icons/hopstarter/superhero-avatar/256/Avengers-Iron-Man-icon.png'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ICON',
   'Black Widow',
   'http://icons.iconarchive.com/icons/hopstarter/superhero-avatar/256/Avengers-Black-Widow-icon.png'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ICON',
   'Captain America',
   'http://icons.iconarchive.com/icons/hopstarter/superhero-avatar/256/Avengers-Captain-America-icon.png'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ICON',
   'Giant Man',
   'http://icons.iconarchive.com/icons/hopstarter/superhero-avatar/256/Avengers-Giant-Man-icon.png'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ICON',
   'The Hulk',
   'http://icons.iconarchive.com/icons/hopstarter/superhero-avatar/256/Avengers-Hulk-icon.png'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ICON',
   'Haweye',
   'http://icons.iconarchive.com/icons/hopstarter/superhero-avatar/256/Avengers-Hawkeye-icon.png'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ICON',
   'Nick Fury',
   'http://icons.iconarchive.com/icons/hopstarter/superhero-avatar/256/Avengers-Nick-Fury-icon.png'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ICON',
   'Thor',
   'http://icons.iconarchive.com/icons/hopstarter/superhero-avatar/256/Avengers-Thor-icon.png'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ICON',
   'Loki',
   'http://icons.iconarchive.com/icons/hopstarter/superhero-avatar/256/Avengers-Loki-icon.png'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ICON',
   'War Machine',
   'http://icons.iconarchive.com/icons/hopstarter/superhero-avatar/256/Avengers-War-Machine-icon.png'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ICON',
   'Agent Coulson',
   'http://icons.iconarchive.com/icons/hopstarter/superhero-avatar/256/Avengers-Agent-Coulson-icon.png'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ICON',
   'Mickey Mouse',
   'http://icons.iconarchive.com/icons/shwz/disney/256/mickey-mouse-icon.png'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ICON',
   'Pumbaa',
   'http://icons.iconarchive.com/icons/shwz/disney/256/pumbaa-icon.png'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ICON',
   'Tarzan',
   'http://icons.iconarchive.com/icons/shwz/disney/256/tarzan-icon.png'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ICON',
   'Timon',
   'http://icons.iconarchive.com/icons/shwz/disney/256/timon-icon.png'
);

INSERT INTO common_lookup (
   context,
   type,
   meaning
) VALUES (
   'ICON',
   'Winnie the Pooh',
   'http://icons.iconarchive.com/icons/shwz/disney/256/winnie-the-pooh-icon.png'
);

