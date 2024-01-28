// takes search and produces graphical Pokemon details
const btnSearch = document.getElementById("btnSearch");


btnSearch.addEventListener("click", () => {
    let pokemonName = document.getElementById("search").value;

    let url = `https://pokeapi.co/api/v2/pokemon/${pokemonName.toLowerCase()}`;

    fetch(url)
    .then(res => res.json())
    .then(res => {
        console.log(res);

        

        const name = document.querySelector("#name");
        name.textContent = res.name.toUpperCase();

        const types = document.querySelector("#types");
        types.innerHTML = ``
        
        for (let index = 0; index < res.types.length; index++) {
            types.innerHTML += 
            `<div>${res.types[index].type.name.toUpperCase()}</div>`
        }


        const stats = document.querySelector("#stats")
        stats.innerHTML = ``
        for (let index = 0; index < res.stats.length; index++) {

            let statName = res.stats[index].stat.name;
            let statValue = res.stats[index].base_stat
            if (index < res.stats.length - 1) {
                stats.innerHTML += `<span>${statName.toUpperCase()}: ${statValue}, </span>`
            }
            else {
                stats.innerHTML += `<span>${statName.toUpperCase()}: ${statValue}</span>`
            }
            
        }
    })
})





