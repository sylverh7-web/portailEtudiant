<?php
// delete_student.php - Supprimer un étudiant

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

// Nom du fichier qui stocke les données
$filename = 'students.json';

// Récupérer l'ID de l'étudiant à supprimer
$id = isset($_GET['id']) ? $_GET['id'] : '';

if (empty($id)) {
    echo json_encode(['success' => false, 'error' => 'ID manquant']);
    exit;
}

// Lire les étudiants existants
$students = [];
if (file_exists($filename)) {
    $content = file_get_contents($filename);
    $students = json_decode($content, true);
    if (!is_array($students)) {
        $students = [];
    }
}

// Filtrer pour supprimer l'étudiant avec cet ID
$newStudents = [];
$found = false;
foreach ($students as $student) {
    if ($student['id'] !== $id) {
        $newStudents[] = $student;
    } else {
        $found = true;
    }
}

if (!$found) {
    echo json_encode(['success' => false, 'error' => 'Étudiant non trouvé']);
    exit;
}

// Sauvegarder les données mises à jour
$result = file_put_contents($filename, json_encode($newStudents, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

if ($result !== false) {
    echo json_encode(['success' => true, 'message' => 'Étudiant supprimé avec succès']);
} else {
    echo json_encode(['success' => false, 'error' => 'Erreur lors de la suppression']);
}
?>