<?php 

   // Database azioni

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "todolist";

   
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if (isset($_POST['submit'])) {
		if (empty($_POST['input'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['input'];
			$sql = "INSERT INTO azioni (azione) VALUES ('$task')";
			mysqli_query($conn, $sql);
			header('location: index.php');
		}
    }
    
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
    
        mysqli_query($conn, "DELETE FROM azioni WHERE id=".$id);
        header('location: index.php');
    }

    if (isset($_GET['done_task'])) {
        $id = $_GET['done_task'];
    
        mysqli_query($conn, 
        "UPDATE azioni 
        SET done = 1
        WHERE id=".$id);
        header('location: index.php');
    }

    // Database Obiettivi
    


    if (isset($_POST['submitobiettivo'])) {
		if (empty($_POST['inputobiettivo'])) {
			$errors = "Devi inserire un'azione";
		}else {
			$obiettivo = $_POST['inputobiettivo'];
			$query = "INSERT INTO obiettivi (obiettivo) VALUES ('$obiettivo')";
			mysqli_query($conn, $query);
			header('location: index.php');
		}
    }
    
    if (isset($_GET['del_taskOb'])) {
        $id = $_GET['del_taskOb'];
    
        mysqli_query($conn, "DELETE FROM obiettivi WHERE id=".$id);
        header('location: index.php');
    }

    if (isset($_GET['done_taskOb'])) {
        $id = $_GET['done_taskOb'];
    
        mysqli_query($conn, 
        "UPDATE obiettivi 
        SET done = 1
        WHERE id=".$id);
        header('location: index.php');
    }
        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jojo - To Do App</title>
    <link href="css/index.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mansalva&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Prompt&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <h1 id="logo">Jojo</h1>
            </nav>
        </header>
        <section id="content">
            <div class="list">
                <h1 class="titolo">To Do</h1> 

                
                <ul class="azioni">
                <?php
                

                    $tasks = mysqli_query($conn, "SELECT * FROM azioni");
                    $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
                    <li>
                    
                    
                        <span class="action <?php echo $row['done'] ? ' actionComplete' : '' ?>">
                            <?php echo $row[azione] ?>
                        </span>
                        
                        <?php if (!$row['done']): ?>
                            <a href="index.php?done_task=<?php echo $row['id']; ?>" class="done">Fatto!</a>
                        <?php endif ?>
                            <a href="index.php?del_task=<?php echo $row['id'] ?>" class="delete">X</a>
                    
                    </li>
                    <?php $i++; } ?>
                </ul>

                
               

                <form class="aggiungereAzioni" method="post" action="index.php"> 

                    <input type="text" name="input"class="actionInput" placeholder="Scrivi un'attività che dovrai svolgere" required autocomplete="off">
                    <input type="submit" name="submit" class="submitButton" value="Aggiungi" required>
                    
                </form>
            </div>

            <!-- Obiettivi -->

            <div class="list">
                <h1 class="titolo">Obiettivi</h1> 

                
                <ul class="azioni">
                <?php
                

                    $obiettivo = mysqli_query($conn, "SELECT * FROM obiettivi");
                    $i = 1; while ($row = mysqli_fetch_array($obiettivo)) { ?>
                    <li>
                    
                    
                        <span class="action <?php echo $row['done'] ? ' actionComplete' : '' ?>">
                            <?php echo $row[obiettivo] ?>
                        </span>
                        
                        <?php if (!$row['done']): ?>
                            <a href="index.php?done_taskOb=<?php echo $row['id']; ?>" class="done">Fatto!</a>
                        <?php endif ?>
                            <a href="index.php?del_taskOb=<?php echo $row['id'] ?>" class="delete">X</a>
                    
                    </li>
                    <?php $i++; } ?>
                </ul>

                
               

                <form class="aggiungereAzioni" method="post" action="index.php"> 

                    <input type="text" name="inputobiettivo"class="actionInput" placeholder="Scrivi un'obiettivo che vuoi raggiungere" required autocomplete="off">
                    <input type="submit" name="submitobiettivo" class="submitButton" value="Aggiungi" required>
                    
                </form>
            </div>


            

            
        </section>
    </div>
</body>
</html>
