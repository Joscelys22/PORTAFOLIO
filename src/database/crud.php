<?php
require_once 'db.php';
date_default_timezone_set('America/Caracas');

// !--- FUNCIONES CRUD PARA LAS NOTAS ---

// * 1. Funcion para agregar una nueva nota
function addComment($nombreyapellido, $usuario, $email, $nota, $conn) {
    $fechanota = date("d/m/Y - h:i A");
    $stmt = $conn->prepare("INSERT INTO notas (nombreyapellido, usuario, email, nota, fechanota) VALUES (?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error preparando la consulta: " . $conn->error);
    }
    $stmt->bind_param("sssss", $nombreyapellido, $usuario, $email, $nota, $fechanota);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}

// * 2. Funcion para obtener todas las notas
function getComments($conn) {
    $sql = "SELECT id, nombreyapellido, usuario, email, nota, fechanota FROM notas ORDER BY created_at DESC";
    $result = $conn->query($sql);
    $comments = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $comments[] = $row;
        }
    }
    return $comments;
}

// * 3. Funcion para obtener una nota por ID (para edicion)
function getCommentById($id, $conn) {
    $stmt = $conn->prepare("SELECT id, nombreyapellido, usuario, email, nota, fechanota FROM notas WHERE id = ?");
    if ($stmt === false) {
        die("Error preparando la consulta: " . $conn->error);
    }
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $comment = $result->fetch_assoc();
    $stmt->close();
    return $comment;
}

// * 4. Funcion para actualizar una nota existente
function updateComment($id, $nombreyapellido, $usuario, $email, $nota, $conn) {
    $stmt = $conn->prepare("UPDATE notas SET nombreyapellido = ?, usuario = ?, email = ?, nota = ? WHERE id = ?");
    if ($stmt === false) {
        die("Error preparando la consulta: " . $conn->error);
    }
    $stmt->bind_param("ssssi", $nombreyapellido, $usuario, $email, $nota, $id);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}

// * 5. Funcion para eliminar una nota
function deleteComment($id, $conn) {
    $stmt = $conn->prepare("DELETE FROM notas WHERE id = ?");
    if ($stmt === false) {
        die("Error preparando la consulta: " . $conn->error);
    }
    $stmt->bind_param("i", $id);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}

// ! --- LOGICA PARA MANEJAR LAS SOLICITUDES DEL FORMULARIO ---

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        switch ($action) {
            case 'add':
                $nombreyapellido = $_POST['nombreyapellido'] ?? '';
                $usuario = $_POST['usuario'] ?? null;
                $email = $_POST['email'] ?? '';
                $nota = $_POST['nota'] ?? '';

                if (empty($nombreyapellido) || empty($email) || empty($nota)) {
                    header('Location: tips.php?status=error&message=Campos obligatorios incompletos');
                    exit;
                }

                if (addComment($nombreyapellido, $usuario, $email, $nota, $conn)) {
                    header('Location: tips.php?status=success&message=Comentario agregado exitosamente');
                } else {
                    header('Location: tips.php?status=error&message=Error al agregar comentario');
                }
                exit;

            case 'edit_form':
                $edit_id = $_POST['edit_id'] ?? null;
                if ($edit_id) {
                    $comment_to_edit = getCommentById($edit_id, $conn);
                }
                break;

            case 'update':
                $id = $_POST['id'] ?? null;
                $nombreyapellido = $_POST['nombreyapellido'] ?? '';
                $usuario = $_POST['usuario'] ?? null;
                $email = $_POST['email'] ?? '';
                $nota = $_POST['nota'] ?? '';

                if (empty($id) || empty($nombreyapellido) || empty($email) || empty($nota)) {
                    header('Location: tips.php?status=error&message=Campos de actualizacion incompletos');
                    exit;
                }

                if (updateComment($id, $nombreyapellido, $usuario, $email, $nota, $conn)) {
                    header('Location: tips.php?status=success&message=Comentario actualizado exitosamente');
                } else {
                    header('Location: tips.php?status=error&message=Error al actualizar comentario');
                }
                exit;

            case 'delete':
                $id = $_POST['delete_id'] ?? null;
                if (empty($id)) {
                    header('Location: tips.php?status=error&message=ID de comentario no especificado');
                    exit;
                }

                if (deleteComment($id, $conn)) {
                    header('Location: tips.php?status=success&message=Comentario eliminado exitosamente');
                } else {
                    header('Location: tips.php?status=error&message=Error al eliminar comentario');
                }
                exit;
        }
    }
}

// ! $conn->close(); // 
?>