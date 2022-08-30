<?php

// --------------------------------------------------------------------------------------
// DEPENDANCES
// --------------------------------------------------------------------------------------

include 'utilities.php';



// --------------------------------------------------------------------------------------
// FONCTIONS
// --------------------------------------------------------------------------------------

function removeTasks(array $allTasks, array $indexes)
{
    // Création d'un nouveau tableau de tâches.
    $tasks = array();

    // Parcours de la liste de tâches spécifiées.
    foreach ($allTasks as $index => $taskData) {

        if (in_array($index, $indexes) == false) {
            array_push($tasks, $taskData);
        }
    }


    return $tasks;
}



// --------------------------------------------------------------------------------------
// CODE PRINCIPAL
// --------------------------------------------------------------------------------------

// Si aucune case à cocher n'est cochée, l'indice n'existera pas dans $_POST !
if (array_key_exists('indexes', $_POST) == true) {
    $allTasks = loadTasks();

    /*
     * Création d'une nouvelle liste de tâches ne comprenant que les tâches qui n'ont pas
     * été sélectionnées.
     */
    $tasks = removeTasks($allTasks, $_POST['indexes']);
    saveTasks($tasks);
}

/*
 * Redirection vers la page d'accueil.
 */
header('Location: index.php');
exit();