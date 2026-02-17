<?php
// add_student.php - Ajouter ou modifier un étudiant

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Nom du fichier qui stockera les données
$filename = 'students.json';

// Lire les données envoyées
$input = file_get_contents('php://input');
$studentData = json_decode($input, true);

if (!$studentData) {
    echo json_encode(['success' => false, 'error' => 'Données invalides']);
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

// Chercher si l'étudiant existe déjà (par ID)
$found = false;
foreach ($students as $key => $student) {
    if ($student['id'] === $studentData['id']) {
        // Modifier l'étudiant existant
        $students[$key] = $studentData;
        $found = true;
        break;
    }
}

// Si pas trouvé, ajouter un nouvel étudiant
if (!$found) {
    $students[] = $studentData;
}

// Sauvegarder dans le fichier JSON
$result = file_put_contents($filename, json_encode($students, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

if ($result !== false) {
    echo json_encode(['success' => true, 'message' => 'Étudiant enregistré avec succès']);
} else {
    echo json_encode(['success' => false, 'error' => 'Erreur lors de la sauvegarde']);
}
?>