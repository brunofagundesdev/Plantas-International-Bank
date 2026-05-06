CREATE DATABASE IF NOT EXISTS plantas_international_bank;
USE plantas_international_bank;

-- =========================
-- USER
-- =========================
CREATE TABLE `user` (
    id CHAR(36) PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL
);

-- =========================
-- ACCOUNT
-- =========================
CREATE TABLE account (
    id CHAR(36) PRIMARY KEY,
    user_id CHAR(36) NOT NULL,
    balance DECIMAL(15,2) NOT NULL DEFAULT 0.00,

    CONSTRAINT fk_account_user
        FOREIGN KEY (user_id) REFERENCES user(id)
        ON DELETE CASCADE
);

-- =========================
-- ACCOUNT KEY
-- =========================
CREATE TABLE account_key (
    id CHAR(36) PRIMARY KEY,
    account_id CHAR(36) NOT NULL,

    type ENUM('CPF', 'EMAIL', 'PHONE') NOT NULL,
    key_value VARCHAR(255) NOT NULL UNIQUE,
    status ENUM('ACTIVE', 'DISABLED') NOT NULL DEFAULT 'ACTIVE',

    CONSTRAINT fk_key_account
        FOREIGN KEY (account_id) REFERENCES account(id)
        ON DELETE CASCADE
);

-- =========================
-- TRANSACTION
-- =========================
CREATE TABLE transaction (
    id CHAR(36) PRIMARY KEY,

    account_from CHAR(36) NULL,
    account_to CHAR(36) NOT NULL,

    type ENUM('PIX', 'BOLETO', 'DEBITO', 'TRANSFERENCIA', 'DEPOSITO') NOT NULL,
    origin_type ENUM('INTERNAL', 'EXTERNAL') NOT NULL,

    description TEXT,
    amount DECIMAL(15,2) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_transaction_from
        FOREIGN KEY (account_from) REFERENCES account(id)
        ON DELETE SET NULL,

    CONSTRAINT fk_transaction_to
        FOREIGN KEY (account_to) REFERENCES account(id)
        ON DELETE CASCADE,

    CONSTRAINT chk_amount_positive
        CHECK (amount > 0)
);

-- =========================
-- INDEXES
-- =========================
CREATE INDEX idx_transaction_from ON transaction(account_from);
CREATE INDEX idx_transaction_to ON transaction(account_to);
CREATE INDEX idx_transaction_timestamp ON transaction(timestamp);