<?php

const DATAFILE = 'tasks.csv';



// --------------------------------------------------------------------------------------
// FONCTIONS
// --------------------------------------------------------------------------------------

function loadTasks()
{
	/*
	 * Ouverture du fichier CSV des tâches en mode lecture avec création d'un fichier
	 * vide s'il n'existe pas encore.
	 */
	$file = fopen(DATAFILE, 'a+');

	// Création d'une liste de tâches vide.
	$tasks = array();

	// Boucle de lecture du fichier CSV, ligne par ligne (= tâche par tâche).
	while (true) {
		// Lecture d'une ligne du fichier CSV, donc d'une tâche.
		$taskData = fgetcsv($file);

		// Est-ce qu'on est à la fin du fichier ?
		if ($taskData == false) {

			break;
		}

		// Ajout de la tâche à la liste de tâches.
		array_push($tasks, $taskData);
	}

	fclose($file);
	return $tasks;
}

function saveTask(array $taskData)
{
	/*
	 * Ouverture du fichier CSV des tâches en mode ajout.
	 *
	 */
	$file = fopen(DATAFILE, 'a');
	fputcsv($file, $taskData);


	fclose($file);
}

function saveTasks(array $tasks)
{

	$file = fopen(DATAFILE, 'w');

	// Boucle d'écriture du fichier CSV, ligne par ligne (= tâche par tâche).
	foreach ($tasks as $taskData) {
		fputcsv($file, $taskData);
	}

	fclose($file);
}