use mysql;

CREATE user 'admin'@'localhost' IDENTIFIED BY "admin";

CREATE DATABASE ccong;
USE ccong;

GRANT ALL PRIVILEGES ON * TO 'admin'@'localhost';

CREATE TABLE associacio(
                           cif varchar(9) PRIMARY KEY,
                           adreca varchar(50) NOT NULL,
                           poblacio varchar(35) NOT NULL,
                           comarca varchar(30) NOT NULL,
                           tipus varchar(35) NOT NULL,
                           utilitat_publica boolean NOT NULL
);

CREATE TABLE soci(
                     nif varchar(9) PRIMARY KEY,
                     nom varchar(60) NOT NULL,
                     adreca varchar(50) NOT NULL,
                     poblacio varchar(35) NOT NULL,
                     comarca varchar(30) NOT NULL,
                     telefon varchar(16),
                     mobil varchar(15) NOT NULL,
                     email varchar(50) NOT NULL,
                     quota numeric(7,2) NOT NULL,
                     aportacio numeric(7,2) NOT NULL,
                     data_alta date NOT NULL,
                     associacio varchar(9) NOT NULL,
                     CONSTRAINT fk_soci_associacio_nif FOREIGN KEY (associacio) REFERENCES associacio(cif)
);

CREATE TABLE treballador(
                            nif varchar(9) PRIMARY KEY,
                            nom varchar(60) NOT NULL,
                            adreca varchar(50) NOT NULL,
                            poblacio varchar(35) NOT NULL,
                            comarca varchar(30) NOT NULL,
                            telefon varchar(16),
                            mobil varchar(15) NOT NULL,
                            email varchar(50) NOT NULL,
                            data_alta date NOT NULL,
                            associacio varchar(9) NOT NULL,
                            CONSTRAINT fk_treballador_associacio_nif FOREIGN KEY (associacio) REFERENCES associacio(cif)
);

CREATE TABLE voluntari(
                          edat int NOT NULL,
                          professio varchar(30) NOT NULL,
                          hores int NOT NULL,
                          nif varchar(9) NOT NULL,
                          CONSTRAINT fk_voluntari_treballador_nif FOREIGN KEY (nif) REFERENCES treballador(nif)
);

CREATE TABLE professional(
                             carrec varchar(35) NOT NULL,
                             quota_ss numeric(7,2) NOT NULL,
                             irpf int NOT NULL,
                             nif varchar(9) NOT NULL,
                             CONSTRAINT fk_professional_treballador_nif FOREIGN KEY (nif) REFERENCES treballador(nif)
);
