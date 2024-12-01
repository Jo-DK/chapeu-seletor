<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapéu Seletor</title>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="/assets/css/app.css">
    <script type='module' src="/assets/js/main.js"></script>
</head>

<body>
    <section>

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
                <button class='btn form-input'> Criar Novo Personagem</button>

            </form>
        </div>

        <div class="mini-form">
            <form id="distribute">
                <input 
                    type="numeric" 
                    name='per_guild'  
                    required 
                    class='form-input' 
                    placeholder='Quantidade por Guilda'>
                <button class='form-input'> Distribuir em Guildas </button>
            </form>
    
        </div>

    </section>

    <section id='characters' ></section>
    <section id='guilds'>

    </section>
    
    

    <script>
 
    </script>
</body>

</html>