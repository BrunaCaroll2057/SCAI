<?php
class User {
    private $conn;
    private $table = 'user_form';

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    // Função para registrar usuário
    public function register($name, $email, $password, $confirm_password, $image) {
        $errors = [];

        // Verifica se usuário já existe
        $stmt = $this->conn->prepare("SELECT id FROM {$this->table} WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $errors[] = 'Este usuário já existe!';
        }
        $stmt->close();

        if ($password !== $confirm_password) {
            $errors[] = 'Confirme a senha corretamente!';
        }

        if (!empty($errors)) {
            return $errors;
        }

        // Hash da senha (recomendo usar password_hash em vez de md5)
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Upload da imagem
        $imageName = $image['name'];
        $imageTmpName = $image['tmp_name'];
        $imageSize = $image['size'];
        $imageFolder = 'processologin/uploaded_img/' . basename($imageName);

        if ($imageSize > 2000000) {
            $errors[] = 'A imagem é muito grande!';
            return $errors;
        }

        // Insere no banco
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, email, password, image, tipo) VALUES (?, ?, ?, ?, ?)");
        $tipo = 'usuario'; // padrão, pode mudar conforme sua regra
        $stmt->bind_param("sssss", $name, $email, $passwordHash, $imageName, $tipo);

        if ($stmt->execute()) {
            move_uploaded_file($imageTmpName, $imageFolder);
            $stmt->close();
            return true;
        } else {
            $errors[] = 'O registro falhou!';
            $stmt->close();
            return $errors;
        }
    }

    // Função para login
    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT id, password, tipo FROM {$this->table} WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $email;
            $_SESSION['user_tipo'] = $user['tipo'];
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    // Função para buscar dados do usuário (corrigido nome do método)
    public function getUserById($id) {
        $stmt = $this->conn->prepare("SELECT id, name, email, image, tipo FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }

    // Função para atualizar perfil
    public function updateProfile($id, $name, $email, $old_password, $new_password, $confirm_password, $image) {
        $errors = [];

        // Buscar senha atual para verificar
        $stmt = $this->conn->prepare("SELECT password FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        $hashed_password = $user['password'] ?? '';

        // Atualizar nome e email
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET name = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $email, $id);
        $stmt->execute();
        $stmt->close();

        // Atualizar senha se informado
        if (!empty($old_password) || !empty($new_password) || !empty($confirm_password)) {
            if (!password_verify($old_password, $hashed_password)) {
                $errors[] = 'A senha antiga não corresponde!';
            } elseif ($new_password !== $confirm_password) {
                $errors[] = 'Confirme a senha corretamente!';
            } else {
                $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $stmt = $this->conn->prepare("UPDATE {$this->table} SET password = ? WHERE id = ?");
                $stmt->bind_param("si", $new_password_hash, $id);
                $stmt->execute();
                $stmt->close();
            }
        }

        // Atualizar imagem se enviada
        if (!empty($image['name'])) {
            if ($image['size'] > 2000000) {
                $errors[] = 'A imagem é muito grande!';
            } else {
                $imageName = $image['name'];
                $imageTmpName = $image['tmp_name'];
                $imageFolder = 'processologin/uploaded_img/' . basename($imageName);

                $stmt = $this->conn->prepare("UPDATE {$this->table} SET image = ? WHERE id = ?");
                $stmt->bind_param("si", $imageName, $id);
                $stmt->execute();
                $stmt->close();

                move_uploaded_file($imageTmpName, $imageFolder);
            }
        }

        if (empty($errors)) {
            return true;
        } else {
            return $errors;
        }
    }
}
