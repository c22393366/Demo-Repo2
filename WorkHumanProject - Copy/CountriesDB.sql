create database countriesDB;

drop table if exists countries;

create table countries(
  name varchar(30) primary key
);

insert into countries(name) values
('Albania'),
('Andorra'),
('Australia'),
('Brazil'),
('Belgium'),
('Canada'),
('China'),
('France'),
('Germany'),
('India'),
('Indonesia'),
('Ireland'),
('Italy'),
('Japan'),
('Kenya'),
('Luxembourg'),
('Mexico'),
('New Zealand'),
('Nigeria'),
('Portugal'),
('Russia'),
('South Africa'),
('South Korea'),
('Spain'),
('Sweden'),
('Thailand'),
('Ukraine'),
('United Kingdom'),
('United States of America'),
('Vietnam'),
('Zambia');
