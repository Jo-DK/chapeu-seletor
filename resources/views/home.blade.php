<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<style>
    body {
        background-color: gray;
    }

    section {
        margin: 15px;
        border: 1px solid black;
        border-radius: 5px;
        background-color: whitesmoke;

    }

    section::after {
        content: "";
        display: table;
        clear: both;
    }

    .mini-form {
        margin: 10px;
        padding: 10px;
        float: left;
        width: 190px;
        background-color: lightblue;
        border-radius: 5px;
    }

    .form-input {
        width: 170px;
        float: left;
        margin: 5px;
        box-sizing: border-box;
    }

    .input-class {
        width: 105px;
    }

    .input-xp {
        width: 55px
    }


    .character-box {
        background-color: #ff80c2;
        border-radius: 5px;
        float: left;
        margin: 5px;
        text-align: center;
        padding: 5px;
        font-size: 12px;

        width: 120px;
        /* height: 50px; */
    }

    .character-box div {
        float: left;
    }

    .character-box .character-name {
        /* background-color: blue; */
        width: 100%;
        font-style: italic;
        overflow: hidden;
    }

    .character-box .character-class {
        /* background-color: red; */
        font-weight: bold;
        width: 60%;
    }

    .character-box .character-xp {
        /* background-color: orange; */
        width: 40%;
        font-weight: bold;
        color: white;
    }
</style>

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




    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        const HOST = 'http://localhost:8000/api';

        const Api = {

            getCharacteres: () => {
                return axios(HOST + '/character');
            },

            postCharacter: (data) => {
                return axios.post(HOST + '/character', data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });
            },

            getGuilds: () => {
                return axios(HOST + '/guild');
            }
        };

        Api.getCharacteres().then(response => {
            buildCharacterList(response.data.data)
        });

        Api.getGuilds().then(response => {
            console.log(response.data)
        });


        const FormCharacter = document.getElementById('create-character');

        FormCharacter.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(event.target);

            Api.postCharacter(formData)
                .then(response => {
                    console.log(response.data);
                })
        })

        function buildCharacterList(data) {
            console.log(data)
            const section = document.getElementById('section-character');
            data.map((char) => {
                createCharacterBox(char, section)
            })
        }

        function createCharacterBox(data, section) {
            const newDiv = document.createElement('div');
            const nameDiv = document.createElement('div');
            const classDiv = document.createElement('div');
            const xpDiv = document.createElement('div');

            newDiv.classList.add('character-box');
            nameDiv.classList.add('character-name');
            classDiv.classList.add('character-class');
            xpDiv.classList.add('character-xp');

            nameDiv.textContent = data.name;
            classDiv.textContent = data.class;
            xpDiv.textContent = 'XP: ' + data.xp;

            newDiv.appendChild(nameDiv);
            newDiv.appendChild(classDiv);
            newDiv.appendChild(xpDiv);

            section.appendChild(newDiv)

        }
    </script>
</body>

</html>