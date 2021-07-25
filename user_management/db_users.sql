-- sqlite3
-- db.sqlite3

CREATE TABLE users (
    id integer NOT NULL PRIMARY KEY AUTOINCREMENT,
    name text,
    email text UNIQUE,
    password text,
    created,
    modified
);
