-- =============================================================================
-- JgArn Library Management System - Insert Data
-- Database: SQL Server (sqlsrv)
-- =============================================================================

-- -----------------------------------------------------------------------------
-- 1. Admin User
-- Password: Admin123  (bcrypt hashed)
-- -----------------------------------------------------------------------------
INSERT INTO users (name, email, password, created_at, updated_at)
VALUES (
    N'Administrator',
    N'admin@gmail.com',
    N'$2y$10$d6MVqxAzDIVvRkSELBfCVuaDcBo0MsLdql8fv69pt984If61/otkG',
    GETDATE(),
    GETDATE()
);
GO

-- -----------------------------------------------------------------------------
-- 2. Categories
-- -----------------------------------------------------------------------------
INSERT INTO categories (CategoryName, Description, CreatedDate, UpdatedDate)
VALUES
    (N'Fiction',     N'Fictional stories and novels',           GETDATE(), NULL),
    (N'Science',     N'Scientific research and publications',     GETDATE(), NULL),
    (N'History',     N'Historical events and biographies',      GETDATE(), NULL),
    (N'Technology',  N'Tech guides and programming books',        GETDATE(), NULL);
GO

-- -----------------------------------------------------------------------------
-- 3. Books
-- Note: CategoryID references the categories inserted above (IDENTITY starts at 1)
-- -----------------------------------------------------------------------------
INSERT INTO books (BookName, CategoryID, Qty, Description, CreatedDate, UpdatedDate)
VALUES
    (N'The Great Gatsby',         1, 10, N'Classic American novel',         GETDATE(), NULL),
    (N'Dune',                      1,  5, N'Science fiction epic',            GETDATE(), NULL),
    (N'A Brief History of Time',  2,  8, N'Stephen Hawking classic',         GETDATE(), NULL),
    (N'Sapiens',                   3, 12, N'History of humankind',            GETDATE(), NULL),
    (N'Clean Code',                4,  7, N'Programming best practices',    GETDATE(), NULL);
GO
