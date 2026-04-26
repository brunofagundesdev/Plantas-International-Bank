# 🌱 Planta's International Bank

A web-based banking system built with CodeIgniter 4, simulating real-world financial operations such as account management, transactions, and secure authentication.

---

## 📌 Overview

Planta's International Bank is a full-stack web application designed to replicate core features of a digital banking system. It allows users to create accounts, authenticate securely, perform transactions, and track financial activity.

The project focuses on:

* Clean MVC architecture
* Secure password handling
* Consistent business rules
* Transaction tracking

---

## 🚀 Features

### 👤 Account Registration

* Create a new user account with:

  * Customer name
  * Initial deposit
* Automatically generated:

  * Account number
  * Username
* Secure password storage using hashing

---

### 🔐 Authentication & Sessions

* Login with username and password
* Password verification using secure hashing
* Session management with CodeIgniter 4

---

### 💰 Transaction History (Statement)

* Complete record of all account activities
* Includes:

  * Credits (incoming funds)
  * Debits (payments and transfers)
* Each transaction stores:

  * Amount
  * Date
  * Type (Pix, boleto, transfer, etc.)
  * Description

---

### 💸 Payments

* Simulated payment methods:

  * Pix
  * Boleto
  * Debit
* Automatic balance update
* Transactions recorded in history

---

### 🔄 Transfers

* Transfer funds between accounts
* Real-time balance updates:

  * Sender account (debit)
  * Receiver account (credit)
* Logged in both accounts' transaction history

---

## ⚠️ Business Rules

* Transactions cannot be completed without sufficient balance
* All operations are recorded in the transaction history
* Each account has a unique identifier
* Data consistency is enforced across operations

---

## 🛠️ Tech Stack

* PHP 8+
* CodeIgniter 4
* MySQL
* HTML5
* CSS3

---

## 🔐 Security

* Passwords are hashed using `password_hash`
* Password verification with `password_verify`
* Session-based authentication
* Protection against invalid operations (e.g., negative balance)

---

## 🗄️ Database

The database schema is available at:

```
/database/schema.sql
```

---

## 📚 Concepts Applied

* MVC Architecture
* Authentication & Authorization
* Session Management
* CRUD Operations
* Business Logic Validation
* Secure Password Handling

---

## 👥 Authors

Developed as an academic project.
