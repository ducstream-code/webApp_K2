<html lang="fr">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <script src="tailwind.js">

    </script>
</head>

<body class="">
<div class="p-32">
    <div class="flex flex-row p-2  justify-between">
        <div class="w-1/2">
            <img class="" src="Card.png" alt="">
        </div>

        <div class="flex w-1/2 flex-col gap-y-24">
            <div class="flex flex-col">
                <label class="text-xl pt-6 pb-2" for="email">E-mail</label>
                <div class="flex gap-x-3">
                    <input id="email" type="email" disabled class="pl-6 rounded-xl p-5 bg-[#EFEFEF] shadow-xl w-3/5 text-3xl font-thin " value="random.boug@gmail.com ">
                    <img class="w-1/12" src="pen.png" alt="">
                </div>

            </div>

            <div class="flex flex-col">
                <label class="text-xl pb-2" id="password" for="password">Mot de passe</label>
                <div class="flex gap-x-3">
                    <input type="password" disabled class="pl-6 rounded-xl p-5 bg-[#EFEFEF] shadow-xl w-3/5 text-3xl font-thin " value="supermdp">
                    <img class="w-1/12" src="pen.png" alt="">
                </div>

            </div>

        </div>
    </div>

    <p class="amount pt-6 pl-1">1999 LC</p>
</div>

</body>
</html>
