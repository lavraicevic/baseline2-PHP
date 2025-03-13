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
        <h1 class="font-semibold text-xl text-slate-200"><?= date('d.m.Y');?></h1>
        <h1 class="font-semibold text-xl text-slate-200"><?= date('H:i');?></h1>
    </div>

    <!--  -->
</body>
</html>