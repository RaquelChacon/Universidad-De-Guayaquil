CREATE DATABASE tienda;
USE tienda;

CREATE TABLE IF NOT EXISTS productos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO productos (nombre, descripcion, precio, stock) VALUES
('Laptop', 'Laptop de 15 pulgadas con 8GB RAM', 799.99, 10),
('Mouse', 'Mouse inalámbrico', 19.99, 50),
('Teclado', 'Teclado mecánico RGB', 89.99, 30),
('Monitor', 'Monitor 24 pulgadas Full HD', 199.99, 15),
('Webcam', 'Webcam 1080p para streaming', 49.99, 20);
