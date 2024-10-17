<?php
// config.php
$host = 'localhost';
$db   = 'todo_list';
$user = 'username';
$pass = 'password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// add_task.php
require_once 'config.php';

$task = $_POST['task'] ?? '';

if ($task) {
    $stmt = $pdo->prepare("INSERT INTO tasks (task) VALUES (?)");
    $stmt->execute([$task]);
    echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
} else {
    echo json_encode(['success' => false]);
}

// get_tasks.php
require_once 'config.php';

$stmt = $pdo->query("SELECT * FROM tasks ORDER BY id DESC");
$tasks = $stmt->fetchAll();
echo json_encode($tasks);

// toggle_task.php
require_once 'config.php';

$id = $_POST['id'] ?? 0;

if ($id) {
    $stmt = $pdo->prepare("UPDATE tasks SET completed = NOT completed WHERE id = ?");
    $stmt->execute([$id]);
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}

// delete_task.php
require_once 'config.php';

$id = $_POST['id'] ?? 0;

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->execute([$id]);
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}