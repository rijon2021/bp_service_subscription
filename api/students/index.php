
<?php
header("Content-Type: application/json");

$host = "5.77.32.139";
$user = "cw_admin";
$password = "@CW#2018";
$dbname = "cw_islampurCollege";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        handleGet($pdo);
        break;
    case 'POST':
        handleGet($pdo);
        break;
    default:
        echo json_encode(['message' => 'Invalid request method']);
        break;
}


function handleGet($pdo) {
    $sql = "SELECT FullName,AdmissionNo FROM CurrentStudentInfo where admission_no=$_GET[admission_no]";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

// function handlePost($pdo, $input) {
//     $sql = "SELECT * FROM orders where WHERE 'admission_id' = '250'";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute();
//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     echo json_encode($result);
// }

// function handlePut($pdo, $input) {
//     $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute(['name' => $input['name'], 'email' => $input['email'], 'id' => $input['id']]);
//     echo json_encode(['message' => 'User updated successfully']);
// }

// function handleDelete($pdo, $input) {
//     $sql = "DELETE FROM users WHERE id = :id";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute(['id' => $input['id']]);
//     echo json_encode(['message' => 'User deleted successfully']);
// }
?>