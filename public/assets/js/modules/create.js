export const Create = {

    CharacterList: (data) => {
        console.log(data)
        const section = document.getElementById('section-character');
        data.map((char) => {
            Create.CharacterBox(char, section)
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
    },

    GuildList: (data) => {

        const section = document.getElementById('guilds');

        data.map((guild) => {
            Create.GuildBox(guild, section)
        })
    },

    GuildBox: (data, target) => {
        const newDiv = document.createElement('div');
        const nameDiv = document.createElement('div');
        const xpSpan = document.createElement('span');

        newDiv.classList.add('guild-box');
        nameDiv.classList.add('guild-name');

        nameDiv.textContent = data.name;
        xpSpan.textContent = ' XP: ' + data.initial_xp;

        nameDiv.appendChild(xpSpan);

        newDiv.appendChild(nameDiv);

        

        data.characters.map((char) => {
            Create.CharacterBox(char, newDiv)
        })

        target.appendChild(newDiv)
    }
}