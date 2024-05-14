<?php

header('Content-Type: application/json');

// Database connection parameters
$host = 'localhost';
$dbname = 'testxui';
$username = 'root';
$password = '';
// array_push(["action" => "get_packages"],$_GET);

try {

    $_get = [
        "action" => "get_package"
    ];
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // Check the action parameter
    if (isset($_get['action'])) {
        switch ($_get['action']) {
            case 'get_package':
                // Get all users
                $stmt = $pdo->prepare('SELECT * FROM users_packages');
                // $stmt->bindParam(':group', $_POST['email'], PDO::PARAM_STR);
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $v = [];
                $s = $users;
                foreach ($s as  $d) {
                    if (in_array(2, json_decode($d->groups))) {
                        array_push($v, $d);
                    }
                }
                echo json_encode(['status' => 'success', 'data' => $v]);
                break;
            case 'get_users':
                // Get all users
                $stmt = $pdo->query('SELECT * FROM users');
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(['status' => 'success', 'data' => $users]);
                break;

            case 'get_user':
                // Get a single user by ID
                if (isset($_GET['id'])) {
                    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
                    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
                    $stmt->execute();
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo json_encode(['status' => 'success', 'data' => $user]);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'User ID is required']);
                }
                break;

            case 'update_user':
                // Update a user by ID
                if (isset($_GET['id'], $_POST['name'], $_POST['email'])) {
                    $stmt = $pdo->prepare('UPDATE users SET name = :name, email = :email WHERE id = :id');
                    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
                    $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
                    $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
                    $stmt->execute();
                    echo json_encode(['status' => 'success', 'message' => 'User updated successfully']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'ID, name, and email are required']);
                }
                break;

            case 'delete_user':
                // Delete a user by ID
                if (isset($_GET['id'])) {
                    $stmt = $pdo->prepare('DELETE FROM users WHERE id = :id');
                    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
                    $stmt->execute();
                    echo json_encode(['status' => 'success', 'message' => 'User deleted successfully']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'User ID is required']);
                }
                break;

            default:
                echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
                break;
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Action parameter is missing']);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}
