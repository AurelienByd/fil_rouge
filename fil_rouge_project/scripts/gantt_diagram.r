# Charger les packages nécessaires
library(ggplot2)
library(lubridate)

Task01 = "01 - Créer le cahier des charges"
StartDate01 = "2024-12-10"
EndDate01 = "2024-12-11"
Task02 = "02 - Lister l'ensemble des tâches"
StartDate02 = "2024-12-16"
EndDate02 = "2024-12-17"
Task03 = "03 - Réaliser le diagramme de Gantt"
StartDate03 = "2024-12-17"
EndDate03 = "2024-12-19"
Task04 = "04 - Élaborer le dictionnaire de données"
StartDate04 = ""
EndDate04 = ""
Task05 = "05 - Construire le schéma entité-association"
StartDate05 = ""
EndDate05 = ""
Task06 = "06 - UML - Cas d’utilisation"
StartDate06 = ""
EndDate06 = ""
Task07 = "07 - UML - Diagramme de séquence"
StartDate07 = ""
EndDate07 = ""
Task08 = "08 - UML - Diagramme d’activité"
StartDate08 = ""
EndDate08 = ""
Task09 = "09 - UML - Diagramme des classes entités"
StartDate09 = ""
EndDate09 = ""
Task10 = "10 - Construire la maquette de l’application"
StartDate10 = ""
EndDate10 = ""
Task11 = "11 - Créer la base de données (contraintes, index, droits)"
StartDate11 = ""
EndDate11 = ""
Task12 = "12 - Alimenter la base de tests"
StartDate12 = ""
EndDate12 = ""
Task13 = "13 - Formaliser des requêtes à l'aide du langage SQL"
StartDate13 = ""
EndDate13 = ""
Task14 = "14 - Assurer les sauvegardes-restaurations de la base de données"
StartDate14 = ""
EndDate14 = ""
Task15 = "15 - Programmer des procédures stockées sur le SGBD"
StartDate15 = ""
EndDate15 = ""
Task16 = "16 - Gérer les vues"
StartDate16 = ""
EndDate16 = ""
Task17 = "17 - Développer des pages web statiques (PHP(Symfony)/TWIG)"
StartDate17 = ""
EndDate17 = ""
Task18 = "18 - Intégrer des scripts clients"
StartDate18 = ""
EndDate18 = ""
Task19 = "19 - Intégrer le style"
StartDate19 = ""
EndDate19 = ""
Task20 = "20 - Développer des composants web d’accès aux données"
StartDate20 = ""
EndDate20 = ""
Task21 = "21 - Mettre en place une API"
StartDate21 = ""
EndDate21 = ""
Task22 = "22 - Développer une application mobile"
StartDate22 = ""
EndDate22 = ""
Task23 = "23 - Préparer et exécuter le déploiement d’une application"
StartDate23 = ""
EndDate23 = ""
Task24 = "24 - UML - Diagramme de déploiement"
StartDate24 = ""
EndDate24 = ""
Task25 = "25 - Publier l’application"
StartDate25 = ""
EndDate25 = ""

# Créer un dataframe avec les données du projet
project <- data.frame(
    Task = c(Task01, Task02, Task03, Task04, Task05, Task06, Task07, Task08, Task09, Task10, Task11, Task12, Task13, Task14, Task15, Task16, Task17, Task18, Task19, Task20, Task21, Task22, Task23, Task24, Task25),
    Start = as.Date(c(StartDate01, StartDate02, StartDate03, StartDate04, StartDate05, StartDate06, StartDate07, StartDate08, StartDate09, StartDate10, StartDate11, StartDate12, StartDate13, StartDate14, StartDate15, StartDate16, StartDate17, StartDate18, StartDate19, StartDate20, StartDate21, StartDate22, StartDate23, StartDate24, StartDate25)),
    End = as.Date(c(EndDate01, EndDate02, EndDate03, EndDate04, EndDate05, EndDate06, EndDate07, EndDate08, EndDate09, EndDate10, EndDate11, EndDate12, EndDate13, EndDate14, EndDate15, EndDate16, EndDate17, EndDate18, EndDate19, EndDate20, EndDate21, EndDate22, EndDate23, EndDate24, EndDate25))
)

# Créer le diagramme de Gantt
gantt_plot <- ggplot(project, aes(x = Start, xend = End, y = Task, yend = Task)) +
    geom_segment(size = 2, color = "red") +
    labs(title = "Diagramme de Gantt", x = "Date", y = "Task") +
    theme_minimal()

# Afficher le diagramme de Gantt
print(gantt_plot)

# Commande terminal pour générer le diagramme :
# Rscript gantt_diagram.r
