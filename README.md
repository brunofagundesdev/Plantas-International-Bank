# 🌱 Planta's International Bank

Sistema bancário web desenvolvido com CodeIgniter 4 como projeto acadêmico, simulando operações reais de um banco digital.

---

## 📌 Sobre o Projeto

O **Planta's International Bank** é uma aplicação que permite o gerenciamento de contas bancárias, incluindo cadastro de usuários, autenticação segura e execução de operações financeiras.

O sistema foi construído com foco em:

* Organização de código (MVC)
* Segurança de dados
* Regras de negócio consistentes
* Experiência do usuário com interface web

---

## 🚀 Funcionalidades

### 👤 Cadastro de Conta

* Criação de usuário com:

  * Nome do cliente
  * Depósito inicial
* Geração automática de:

  * Número da conta
  * Username
* Senha protegida com hash seguro (`password_hash`)

---

### 🔐 Login e Sessão

* Autenticação com username e senha
* Validação com `password_verify`
* Controle de sessão utilizando recursos do CodeIgniter 4

---

### 💰 Extrato Bancário

* Histórico completo de transações
* Registro de:

  * Entradas (créditos)
  * Saídas (débitos)
* Cada transação contém:

  * Valor
  * Data
  * Tipo (Pix, boleto, transferência, etc)
  * Descrição

---

### 💸 Pagamentos

* Simulação de pagamentos via:

  * Pix
  * Boleto
  * Débito
* Atualização automática do saldo
* Registro no extrato

---

### 🔄 Transferências

* Transferência entre contas cadastradas
* Atualização de saldo em tempo real:

  * Conta origem (débito)
  * Conta destino (crédito)
* Registro automático no histórico de ambas as contas

---

## ⚠️ Regras de Negócio

* Não é permitido realizar transações sem saldo suficiente
* Todas as operações são registradas no extrato
* Cada conta possui identificador único
* As transações são armazenadas com data e tipo

---

## 🛠️ Tecnologias Utilizadas

* PHP 8.5.5
* CodeIgniter 4
* MySQL
* HTML5
* CSS3

---

## 🔐 Segurança

* Senhas armazenadas com `password_hash`
* Verificação com `password_verify`
* Uso de sessões para autenticação
* Proteção contra operações inválidas (ex: saldo negativo)

---

## 💻 Ambiente de Desenvolvimento

* XAMPP (Apache + MySQL)
* Execução local

---

## ⚙️ Como Executar o Projeto

1. Clone o repositório:

   ``` bash
   git clone <url-do-repositorio>
   ```

2. Configure o banco de dados:

   * Crie um banco no MySQL
   * Importe o arquivo `.sql` do projeto

3. Configure o arquivo `.env`:

   ```env
   database.default.hostname = localhost
   database.default.database = plantas_international-bank
   database.default.username = root
   database.default.password = 
   database.default.DBDriver = MySQLi
   ```

4. Inicie o servidor:

   ```
   http://localhost/seu-projeto/public
   ```

---

## 📚 Conceitos Aplicados

* Arquitetura MVC
* Autenticação e autorização
* Gerenciamento de sessões
* Validação de regras de negócio
* CRUD completo
* Segurança de senhas

---

## 👥 Autores

- Bruno Fagundes Garcia - Nº2024314496
- Cristian Ferreira Vaz - Nº2024314511