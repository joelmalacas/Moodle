create TABLE aluno (id int, nome varchar(100), email varchar(50), passe varchar(20), 
                    telemovel varchar(15), morada varchar(50), codPostal varchar(10),
                    DataNascimento DATE, nacionalidade varchar(20), naturalidade varchar(30),
                    genero varchar(20), PortadorDocumento varchar(30), NumeroDocumento varchar(20),
                    DataValidadeDocumento DATE, contribuinte varchar(9), habilitacao varchar(15),
                    situacao_profissional varchar(20), Empresa varchar(50), DataConta DATE, estado varchar(10),
                    primary key (id,email));