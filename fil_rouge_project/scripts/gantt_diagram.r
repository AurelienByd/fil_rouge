# Charger les packages nécessaires
library(ggplot2)
library(lubridate)

Task1 = "01 - Collaborer à la gestion d’un projet informatique"
Task2 = "02 - Élaborer le dictionnaire de données"
Task3 = "03 - Construire le schéma entité-association"
Task4 = "04 - UML - Cas d’utilisation"

# Créer un dataframe avec les données du projet
project <- data.frame(
    Task = c(Task1, Task2, Task3, Task4),
    Start = as.Date(c("2024-10-28", "2024-10-30", "2024-10-31", "2024-11-05")),
    End = as.Date(c("2024-10-29", "2024-10-31", "2024-11-04", "2024-11-06"))
)

# Créer le diagramme de Gantt
gantt_plot <- ggplot(project, aes(x = Start, xend = End, y = Task, yend = Task)) +
    geom_segment(size = 2, color = "pink") +
    labs(title = "Diagramme de Gantt", x = "Date", y = "Task") +
    theme_minimal()

# Afficher le diagramme de Gantt
print(gantt_plot)
