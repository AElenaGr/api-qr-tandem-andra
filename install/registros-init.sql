INSERT INTO
    users (nombre, email, password, role)
VALUES (
        'Juan Perez',
        'juan.perez@example.com',
        'password123',
        'employee'
    ),
    (
        'Maria Lopez',
        'maria.lopez@example.com',
        'password123',
        'admin'
    ),
    (
        'Carlos Gomez',
        'carlos.gomez@example.com',
        'password123',
        'employee'
    ),
    (
        'Ana Martinez',
        'ana.martinez@example.com',
        'password123',
        'employee'
    ),
    (
        'Luis Fernandez',
        'luis.fernandez@example.com',
        'password123',
        'admin'
    );
    INSERT INTO
    qr_codes (code, description, created_by)
VALUES (
        'QR1',
        'Código QR para Juan Perez',
        1
    ),
    (
        'QR2',
        'Código QR para Maria Lopez',
        2
    ),
    (
        'QR3',
        'Código QR para Carlos Gomez',
        3
    ),
    (
        'QR4',
        'Código QR para Ana Martinez',
        4
    ),
    (
        'QR5',
        'Código QR para Luis Fernandez',
        5
    );
    SELECT
    qr_codes.id AS qr_id,
    qr_codes.code AS qr_code,
    qr_codes.description AS qr_description,
    qr_codes.created_at AS qr_created_at,
    users.id AS user_id,
    users.nombre AS user_name,
    users.email AS user_email,
    users.role AS user_role
FROM qr_codes
    JOIN users ON qr_codes.created_by = users.id;