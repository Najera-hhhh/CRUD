CREATE DATABASE empresa;

USE empresa;

CREATE TABLE productos(
    idMaterial VARCHAR(20) PRIMARY KEY NOT NULL,
    descripcion VARCHAR(60),
    unidadMedida VARCHAR(10),
    precio1 DOUBLE(13, 3)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE clientes(
    idCliente INT(11) PRIMARY KEY AUTO_INCREMENT,
    razonSocial VARCHAR(60),
    RFC VARCHAR(15)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE documento (
    idCodigo INT(11) PRIMARY KEY AUTO_INCREMENT,
    idCliente INT(11),
    razonSocial VARCHAR(60),
    RFC VARCHAR(15),
    subtotal DOUBLE(13, 3),
    iva DOUBLE(13, 3),
    total DOUBLE(13, 3)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE documentorenglon (
    idCodigo INT(11) PRIMARY KEY AUTO_INCREMENT,
    idMaterial VARCHAR(20),
    unidadMedida VARCHAR(10),
    cantidad DOUBLE(13, 3),
    precio1 DOUBLE(13, 3)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

ALTER TABLE
    documento
ADD
    CONSTRAINT fK_documento_cliente FOREIGN KEY (idCliente) REFERENCES clientes(idCliente);

ALTER TABLE
    documentorenglon
ADD
    CONSTRAINT fK_documentorenglon_productos FOREIGN KEY (idMaterial) REFERENCES productos(idMaterial);