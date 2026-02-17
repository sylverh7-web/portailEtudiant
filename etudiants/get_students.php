<?php
// get_students.php - Récupérer tous les étudiants

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

// Nom du fichier qui stocke les données
$filename = 'students.json';

// Si le fichier n'existe pas encore, créer un fichier vide avec les données exemples
if (!file_exists($filename)) {
    $sampleData = [
        [
            "id" => "ET2024001",
            "nom" => "DEUTOU",
            "prenom" => "BRAYAN",
            "classe" => "BTS GÉNIE LOGICIEL 1",
            "statut" => [
                "semestre1" => "valide",
                "semestre2" => "valide"
            ],
            "scolarite" => [
                "tranche1" => "payee",
                "tranche2" => "payee",
                "tranche3" => "non-payee"
            ],
            "absences" => [
                "justifiees" => 2,
                "injustifiees" => 1,
                "total" => 3
            ],
            "notesSem1" => [
                ["matiere" => "Maths", "note" => 14.5, "coefficient" => 3, "semestre" => 1],
                ["matiere" => "Anglais", "note" => 15.0, "coefficient" => 2, "semestre" => 1],
                ["matiere" => "Français", "note" => 13.5, "coefficient" => 2, "semestre" => 1]
            ],
            "notesSem2" => [
                ["matiere" => "Introduction Génie Logiciel", "note" => 15.5, "coefficient" => 3, "semestre" => 2],
                ["matiere" => "Algèbre De Boole", "note" => 14.0, "coefficient" => 2, "semestre" => 2],
                ["matiere" => "Infographie", "note" => 16.5, "coefficient" => 3, "semestre" => 2],
                ["matiere" => "Algorithme De Base", "note" => 15.0, "coefficient" => 2, "semestre" => 2]
            ],
            "hideGrades" => false,
            "hideValidation" => false
        ],
        [
            "id" => "ET2024002",
            "nom" => "KAMDEM",
            "prenom" => "PRINCESS",
            "classe" => "BTS GÉNIE LOGICIEL 1",
            "statut" => [
                "semestre1" => "valide",
                "semestre2" => "valide"
            ],
            "scolarite" => [
                "tranche1" => "payee",
                "tranche2" => "payee",
                "tranche3" => "payee"
            ],
            "absences" => [
                "justifiees" => 1,
                "injustifiees" => 0,
                "total" => 1
            ],
            "notesSem1" => [
                ["matiere" => "Maths", "note" => 16.5, "coefficient" => 3, "semestre" => 1],
                ["matiere" => "Anglais", "note" => 17.0, "coefficient" => 2, "semestre" => 1],
                ["matiere" => "Français", "note" => 16.0, "coefficient" => 2, "semestre" => 1]
            ],
            "notesSem2" => [
                ["matiere" => "Introduction Génie Logiciel", "note" => 17.0, "coefficient" => 3, "semestre" => 2],
                ["matiere" => "Algèbre De Boole", "note" => 16.5, "coefficient" => 2, "semestre" => 2],
                ["matiere" => "Infographie", "note" => 18.0, "coefficient" => 3, "semestre" => 2],
                ["matiere" => "Algorithme De Base", "note" => 17.5, "coefficient" => 2, "semestre" => 2]
            ],
            "hideGrades" => false,
            "hideValidation" => false
        ],
        [
            "id" => "ET2024003",
            "nom" => "RÉBECCA",
            "prenom" => "LAURE",
            "classe" => "BTS GÉNIE LOGICIEL 1",
            "statut" => [
                "semestre1" => "valide",
                "semestre2" => "valide"
            ],
            "scolarite" => [
                "tranche1" => "payee",
                "tranche2" => "non-payee",
                "tranche3" => "non-payee"
            ],
            "absences" => [
                "justifiees" => 3,
                "injustifiees" => 2,
                "total" => 5
            ],
            "notesSem1" => [
                ["matiere" => "Maths", "note" => 13.5, "coefficient" => 3, "semestre" => 1],
                ["matiere" => "Anglais", "note" => 14.0, "coefficient" => 2, "semestre" => 1],
                ["matiere" => "Français", "note" => 12.5, "coefficient" => 2, "semestre" => 1]
            ],
            "notesSem2" => [
                ["matiere" => "Introduction Génie Logiciel", "note" => 14.5, "coefficient" => 3, "semestre" => 2],
                ["matiere" => "Algèbre De Boole", "note" => 13.0, "coefficient" => 2, "semestre" => 2],
                ["matiere" => "Infographie", "note" => 15.5, "coefficient" => 3, "semestre" => 2],
                ["matiere" => "Algorithme De Base", "note" => 14.0, "coefficient" => 2, "semestre" => 2]
            ],
            "hideGrades" => false,
            "hideValidation" => false
        ],
        [
            "id" => "ET2024004",
            "nom" => "KAMTO",
            "prenom" => "SYLVERE",
            "classe" => "BTS GÉNIE LOGICIEL 1",
            "statut" => [
                "semestre1" => "valide",
                "semestre2" => "valide"
            ],
            "scolarite" => [
                "tranche1" => "payee",
                "tranche2" => "payee",
                "tranche3" => "non-payee"
            ],
            "absences" => [
                "justifiees" => 4,
                "injustifiees" => 5,
                "total" => 9
            ],
            "notesSem1" => [
                ["matiere" => "Maths", "note" => 11.5, "coefficient" => 3, "semestre" => 1],
                ["matiere" => "Anglais", "note" => 12.0, "coefficient" => 2, "semestre" => 1],
                ["matiere" => "Français", "note" => 10.5, "coefficient" => 2, "semestre" => 1]
            ],
            "notesSem2" => [
                ["matiere" => "Introduction Génie Logiciel", "note" => 12.5, "coefficient" => 3, "semestre" => 2],
                ["matiere" => "Algèbre De Boole", "note" => 11.0, "coefficient" => 2, "semestre" => 2],
                ["matiere" => "Infographie", "note" => 13.5, "coefficient" => 3, "semestre" => 2],
                ["matiere" => "Algorithme De Base", "note" => 12.0, "coefficient" => 2, "semestre" => 2]
            ],
            "hideGrades" => false,
            "hideValidation" => false
        ]
    ];
    
    file_put_contents($filename, json_encode($sampleData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// Lire et renvoyer les données
$content = file_get_contents($filename);
$students = json_decode($content, true);

if (!is_array($students)) {
    $students = [];
}

echo json_encode($students, JSON_UNESCAPED_UNICODE);
?>