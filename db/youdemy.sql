CREATE DATABASE youdemy ;

USE youdemy ;


CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT , 
    name VARCHAR(50) UNIQUE, 
    description TEXT , 
    logo VARCHAR(255)
)

CREATE TABLE utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT , 
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(50),
    photo VARCHAR(250)
)

CREATE Table categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (50),
    description TEXT
)

CREATE tags (
    id INT PRIMARY KEY AUTO_INCREMENT ,
    name VARCHAR(50),
    description TEXT,
    logo VARCHAR(250),
)

CREATE TABLE cours (
    
    id INT PRIMARY KEY AUTO_INCREMENT ,
    name VARCHAR (250),
    description TEXT , 
    contenu VARCHAR (255),
    photo VARCHAR (255)

)


