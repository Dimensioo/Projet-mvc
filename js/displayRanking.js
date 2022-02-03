function displayRank(){
    event.preventDefault();
    let rank6 = document.getElementById('rank6');
    let rank7 = document.getElementById('rank7');
    let rank8 = document.getElementById('rank8');
    let rank9 = document.getElementById('rank9');
    let rank10 = document.getElementById('rank10');
    let buttonRank = document.getElementById('buttonRank');
    if(rank6.className == 'invisible'){
        rank6.className = 'visible';
        rank7.className = 'visible';
        rank8.className = 'visible';
        rank9.className = 'visible';
        rank10.className = 'visible';
        buttonRank.innerHTML = 'Voir moins...';
    }
    else{
        rank6.className = 'invisible';
        rank7.className = 'invisible';
        rank8.className = 'invisible';
        rank9.className = 'invisible';
        rank10.className = 'invisible';
        buttonRank.innerHTML = 'Voir plus...';
    }
}