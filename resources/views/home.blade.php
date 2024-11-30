<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">
    <script type='module' src="{{ asset('assets/js/main.js') }}"></script>
</head>

<body>
    <section id='section-character'>
        <div class='mini-form'>
            <form id='create-character'>
                <input class='form-input' required type="text" name='name' placeholder='Nome do Personagem'>
                <select name="class" id="class" class='form-input input-class'>
                    <option value="Guerreiro">Guerreiro</option>
                    <option value="Mago">Mago</option>
                    <option value="Clérigo">Clérigo</option>
                    <option value="Arqueiro">Arqueiro</option>
                </select>
                <input required type="number" name='xp' class='form-input input-xp' placeholder='Xp'>
                <button class='btn form-input'> Criar Novo </button>

            </form>
        </div>
    </section>
    <section>
        <div class="mini-form">
            <form id="distribute">
                <input type="numeric" name='per_guild'  required class='form-input' placeholder='Número de Personagens'>
                <button class='form-input'> Gerar Guildas </button>
            </form>
    
        </div>

    </section>


    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    

    <script>
 
    </script>
</body>

</html>