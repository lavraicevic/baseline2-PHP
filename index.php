<?php
date_default_timezone_set('Europe/Belgrade')

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

    <!-- Input -->
    <h1 class="py-4 font-semibold text-center text-neutral-400 text-4xl ">To do's</h1>

    <div class="mt-8 w-1/2 mx-auto flex justify-center gap-10">

        <form method="POST" class="flex flex-col gap-2 w-[320px]">

            <label class="text-slate-200">Title: 
                <input class="border-2 border-slate-200 rounded-lg pl-1" type="text" name="title" id="">
            </label>

            <label class="text-slate-200">Description: <br>
                <textarea class="border-2 border-slate-200 rounded-lg" name="title" rows="4" cols="40"></textarea>
            </label>


            <label class="text-slate-200">Due date: 
                <input class="border-2 border-slate-200 rounded-lg pl-1" type="date" name="due_date" id="">
            </label>

            <input class=" mt-2 border-2 border-slate-200 rounded-lg flex justify-center items-center text-zinc-200 w-30 transition-linear duration-300 hover:bg-zinc-200 hover:text-black " type="submit" value="Add to do">
        </form>

    </div>

    <!-- Output -->

    
    
</body>
</html>