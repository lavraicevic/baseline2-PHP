<?php

// DATABASE connection
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "baseline2";

try {
    $conn = new PDO("mysql:host=" . $dbhost . ";dbname=" . $dbname , $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = trim($_POST["title"]);
        $body = trim($_POST["body"]);
        $due_date = $_POST["due_date"];  // Ovdje je ispravljeno ime varijable

        // Insert statement
        $sql = "INSERT INTO todo_list (title, body, due_date) VALUES (:title, :body, :due_date)";
        $statement = $conn->prepare($sql);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':body', $body);
        $statement->bindParam(':due_date', $due_date);
        $statement->execute();
    }

    // Fetch all todo list items
    $sql = "SELECT * FROM todo_list ORDER BY id DESC";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $todo_list = $statement->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

date_default_timezone_set('Europe/Belgrade');

?>

<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baseline check 2</title>

    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

</head>
<body class="h-full bg-black">

    <!-- Date and time -->
    <div class="flex justify-center gap-8">
        <p class="font-semibold text-xl text-slate-200"><?= date('d.m.Y');?></p>
        <p class="font-semibold text-xl text-slate-200"><?= date('H:i');?></p>
    </div>

    <!-- Input Form -->
    <h1 class="py-4 font-semibold text-center text-neutral-400 text-4xl ">To do's</h1>

    <div class="mt-8 w-1/2 mx-auto flex justify-center gap-10">

        <form method="POST" class="flex flex-col gap-2 w-[320px]" name="todoForm" onsubmit="return validateForm()">
            <label class="text-slate-200">Name: 
                <input class="border-2 border-slate-200 rounded-lg pl-1" type="text" name="title">
            </label>

            <label class="text-slate-200">Description: <br>
                <textarea class="border-2 border-slate-200 rounded-lg w-full" name="body" rows="4" cols="40"></textarea>
            </label>

            <label class="text-slate-200">Due date: 
                <input class="border-2 border-slate-200 rounded-lg pl-1" type="date" name="due_date">
            </label>

            <input class="mt-2 border-2 border-slate-200 rounded-lg flex justify-center items-center text-zinc-200 w-30 transition-linear duration-300 hover:bg-zinc-200 hover:text-black" type="submit" value="Add to do">
        </form>

        <!-- Output Todo List -->
        <ul class="w-[320px]">
            <?php foreach ($todo_list as $item): ?>
                <li class="text-zinc-200">
                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-xl mb-1"><?= $item['title']; ?></h2>
                        <p class="text-md italic mb-1"><?= $item['due_date']; ?></p>
                    </div>

                    <p class="text-neutral-200 text-sm"><?= $item['body']; ?></p>
                    <button class="mt-3 px-4 py-1 border-2 border-red-600 text-red-600 transition-linear duration-300 hover:bg-red-600 hover:text-black hover:border-red-600">Delete</button>
                </li>
            <?php endforeach; ?>
        </ul>

    </div>
    
    <script src="script.js"></script>

</body>
</html>





