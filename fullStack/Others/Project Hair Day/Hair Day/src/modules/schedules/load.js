import { hoursLoad } from '../form/hoursLoad.js';

//Seleciona o input de data
const selectedDate = document.getElementById('date');

export function schedulesDay () {
    const date = selectedDate.value;
    //Renderiza as horas disponíveis de acordo com o dia selecionado
    hoursLoad({date});
    
}