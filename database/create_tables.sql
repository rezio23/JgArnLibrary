-- =============================================================================
-- JgArn Library Management System - Create Tables
-- Database: SQL Server (sqlsrv)
-- =============================================================================

-- -----------------------------------------------------------------------------
-- 1. users
-- -----------------------------------------------------------------------------
CREATE TABLE users (
    id BIGINT IDENTITY(1,1) PRIMARY KEY,
    name NVARCHAR(255) NOT NULL,
    email NVARCHAR(255) NOT NULL UNIQUE,
    email_verified_at DATETIME NULL,
    password NVARCHAR(255) NOT NULL,
    remember_token NVARCHAR(100) NULL,
    created_at DATETIME NOT NULL DEFAULT GETDATE(),
    updated_at DATETIME NULL
);
GO

-- -----------------------------------------------------------------------------
-- 2. password_reset_tokens
-- -----------------------------------------------------------------------------
CREATE TABLE password_reset_tokens (
    email NVARCHAR(255) PRIMARY KEY,
    token NVARCHAR(255) NOT NULL,
    created_at DATETIME NULL
);
GO

-- -----------------------------------------------------------------------------
-- 3. sessions
-- -----------------------------------------------------------------------------
CREATE TABLE sessions (
    id NVARCHAR(255) PRIMARY KEY,
    user_id BIGINT NULL,
    ip_address NVARCHAR(45) NULL,
    user_agent NVARCHAR(MAX) NULL,
    payload NVARCHAR(MAX) NOT NULL,
    last_activity INT NOT NULL
);
GO

CREATE INDEX idx_sessions_user_id ON sessions(user_id);
GO

CREATE INDEX idx_sessions_last_activity ON sessions(last_activity);
GO

-- -----------------------------------------------------------------------------
-- 4. personal_access_tokens (Laravel Sanctum)
-- -----------------------------------------------------------------------------
CREATE TABLE personal_access_tokens (
    id BIGINT IDENTITY(1,1) PRIMARY KEY,
    tokenable_type NVARCHAR(255) NOT NULL,
    tokenable_id BIGINT NOT NULL,
    name NVARCHAR(MAX) NOT NULL,
    token NVARCHAR(64) NOT NULL UNIQUE,
    abilities NVARCHAR(MAX) NULL,
    last_used_at DATETIME NULL,
    expires_at DATETIME NULL,
    created_at DATETIME NOT NULL DEFAULT GETDATE(),
    updated_at DATETIME NULL
);
GO

CREATE INDEX idx_personal_access_tokens_tokenable ON personal_access_tokens(tokenable_type, tokenable_id);
GO

CREATE INDEX idx_personal_access_tokens_expires_at ON personal_access_tokens(expires_at);
GO

-- -----------------------------------------------------------------------------
-- 5. categories
-- -----------------------------------------------------------------------------
CREATE TABLE categories (
    CategoryID BIGINT IDENTITY(1,1) PRIMARY KEY,
    CategoryName NVARCHAR(255) NOT NULL,
    Description NVARCHAR(MAX) NULL,
    CreatedDate DATETIME NOT NULL DEFAULT GETDATE(),
    UpdatedDate DATETIME NULL
);
GO

-- -----------------------------------------------------------------------------
-- 6. books
-- -----------------------------------------------------------------------------
CREATE TABLE books (
    BookID BIGINT IDENTITY(1,1) PRIMARY KEY,
    BookName NVARCHAR(255) NOT NULL,
    CategoryID BIGINT NOT NULL,
    Qty INT NOT NULL DEFAULT 0,
    Description NVARCHAR(MAX) NULL,
    CreatedDate DATETIME NOT NULL DEFAULT GETDATE(),
    UpdatedDate DATETIME NULL,
    CONSTRAINT fk_books_categories FOREIGN KEY (CategoryID)
        REFERENCES categories(CategoryID)
        ON DELETE CASCADE
);
GO
