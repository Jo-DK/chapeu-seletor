import { Api } from './api.js';

export const Create = {

    Guilds: [],

    CharacterList: (data) => {

        const section = document.getElementById('characters');
        data.map((char) => {
            Create.CharacterBox(char, section);

        })
    },

    CharacterBox: (data, target) => {
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

        target.appendChild(newDiv)

        return newDiv;
    },

    GuildList: (data) => {

        Create.Guilds = data;
        const section = document.getElementById('guilds');

        data.map((guild) => {
            Create.GuildBox(guild, section)
        })
    },

    GuildBox: (guildList, target) => {
        const newDiv = document.createElement('div');
        const nameDiv = document.createElement('div');
        const xpSpan = document.createElement('span');

        newDiv.classList.add('guild-box');
        nameDiv.classList.add('guild-name');

        nameDiv.textContent = guildList.name;

        nameDiv.appendChild(xpSpan);

        newDiv.appendChild(nameDiv);

        let totalXp = 0;

        guildList.guild_characters.map((char) => {
            totalXp += char.character.xp;
            let divChar = Create.CharacterBox(char.character, newDiv)
            Create.SelectGuild(divChar, char.id, guildList.id)

            divChar.addEventListener('mouseover', () => {
                divChar.classList.add('show');
            });
            
            divChar.addEventListener('mouseout', () => {
                divChar.classList.remove('show');
            });
        })

        xpSpan.textContent = ' XP: ' + totalXp;

        target.appendChild(newDiv)
    },

    SelectGuild: (div, vincule_id, idGuild) => {

        let select = document.createElement('select');
        select.setAttribute('data-id', vincule_id)
        select.classList.add('form-input')
        select.addEventListener('change', function() {
            Api.putGuildCharater(vincule_id, this.value)
                .then(response => {
                    location.reload();
                })
        })
        Create.Guilds.map((guild) => {

            let option = document.createElement('option');
            option.value = guild.id;
            option.textContent = guild.name
            if (guild.id === idGuild)
                option.selected = true;

            select.appendChild(option);
            div.appendChild(select)

            return select;
        })
    },

}