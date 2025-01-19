CREATE DATABASE youdemy ;

USE youdemy ;


CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT , 
    rolename VARCHAR(50) UNIQUE, 
    roledescription TEXT , 
    rolelogo VARCHAR(255)
)

CREATE TABLE utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT , 
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(50),
    photo VARCHAR(250),
    role_id INT ,
    FOREIGN KEY (role_id) REFERENCES roles (id)
)

CREATE Table categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (50),
    photo VARCHAR (250),
    description TEXT
)

CREATE TABLE tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    description TEXT
)

CREATE TABLE cours (

    id INT PRIMARY KEY AUTO_INCREMENT ,
    name VARCHAR (250),
    description TEXT , 
    contenu VARCHAR (255),
    photo VARCHAR (255),
    categorie_id INT ,
    FOREIGN KEY (categorie_id) REFERENCES categories (id)

)

CREATE TABLE tag_cour(
    
    tags_id INT ,
    FOREIGN KEY (tags_id) REFERENCES tags (id),
    cour_id INT ,
    FOREIGN KEY (cour_id) REFERENCES cours (id),
    PRIMARY KEY (tags_id, cour_id)

)


