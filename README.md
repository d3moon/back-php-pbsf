
# Backend PHP- Desafio PBSF

Essa aplicação destina-se à criação de uma API em Python usando PHP que tem como objetivo manipular uma aplicação de Vacinas. 

**As funcionalidades da API são:**

- Criar Vacinas;
- Atualizar Vacinas
- Deletar Vacinas;
- Listar Vacinas;
- Possui persistência com o banco de dados MySQL;


## Instalação

```bash
  git clone https://github.com/d3moon/back-php-pbsf.git
  cd back-php-pbsf
```
1. Coloque a pasta em um servidor PHP: ex: (XAMPP)
2. Crie o banco e a respectiva tabela no MySQL:
```sql
    CREATE DATABASE vaccine;
    USE vaccine;

    CREATE TABLE vaccines (
      id INT AUTO_INCREMENT PRIMARY KEY,
      nome VARCHAR(255) NOT NULL,
      publico_alvo VARCHAR(20) NOT NULL
    );

```

3. Coloque suas credenciais no arquivo de database:
```bash
    private $host = "";
    private $db_name = "vaccine";
    private $username = "";
    private $password = "";
    private $port = 3306; (Mude caso esteja em outra porta.)
```
4. Suba o servidor PHP com o XAMPP ou outro servidor.

</br>

## Referência de API

| Rota      | Método | Descrição |
| ----------- | ----------- | ----------- |
| /vacinas/     | POST     | Registrar Vacinas       |
| /vacinas/   | GET        |  Listar Vacinas       |
| /vacinas?id=""   | GET        |  Listar Vacina Específica     |
| /vacinas/   | PUT        |  Atualizar Vacinas       |
| /vacinas/   | DELETE        |  Deletar Vacinas       |


## Authors

- [João Victor F. Braga](https://www.github.com/d3moon)
- [LinkedIn](https://www.linkedin.com/in/d3moon)

# back-php-pbsf
